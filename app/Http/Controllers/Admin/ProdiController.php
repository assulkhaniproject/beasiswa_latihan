<?php

namespace App\Http\Controllers\Admin;

use App\Prodi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Beasiswa;
use App\Kategori;
use DB;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Prodi::all();
        return view('pages.admin.prodi.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.prodi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
          'nama' => 'required',
          'email' => 'required|unique:prodi',
          'no_hp' => 'required|max:12',
          'password' => 'required|min:8',
          'program_study' => 'required|unique:prodi',
          'kuota_beasiswa' => 'required|unique:prodi',
            'logo' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $logo = $request->file('logo');
        $filename = time().'.'. $logo->getClientOriginalExtension();
        $destinationPath = public_path('/uploads/admin prodi');
        $logo->move($destinationPath, $filename);

        $data = new Prodi();
        $data->nama = $request->nama;
        $data->email = $request->email;
        $data->no_hp = $request->no_hp;
        $data->password = Hash::make($request->password);
        $data->program_study = $request->program_study;
        $data->kuota_beasiswa = $request->kuota_beasiswa;
        $data->logo = $filename;
        $data->save();

        return redirect()->route('prodi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Prodi::find($id);
        return view('pages.admin.prodi.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama' => 'required',
            'email' => 'required',
            'no_hp' => 'required|max:13',
            'program_study' => 'required:unique:prodi',
            'kuota_beasiswa' => 'required|max:2',
        ]);

        $data = Prodi::find($id);
        $kategories = Kategori::where('status', 1)->get();
        $kategoriBeasiswas = [];
        foreach ($kategories as $kategori){
            $kategoriBeasiswas[] = Beasiswa::whereHas('mahasiswa', function ($query) use ($id) {
                $query->where('id_prodi', $id);
            })->select('kategori')->where('kategori', $kategori->kategori)->groupBy('kategori')->first();
        }


        if($request->kuota_beasiswa < $data->kuota_beasiswa){
            foreach ($kategoriBeasiswas as $kategoriBeasiswa){
                $cekPenghasilanTerkecil = Beasiswa::whereHas('mahasiswa', function ($query) use ($data){
                    $query->where('id_prodi', $data->id);
                })->select('penghasilan_ortu','kategori')
                    ->where('kategori', $kategoriBeasiswa->kategori)
                    ->orderBy('penghasilan_ortu', 'ASC')->first()->penghasilan_ortu;

                $cekTanggunganTerbesar = Beasiswa::whereHas('mahasiswa', function ($query) use ($data) {
                    $query->where('id_prodi', $data->id);
                })->select('tanggungan_ortu','kategori')
                    ->where('kategori', $kategoriBeasiswa->kategori)
                    ->orderBy('tanggungan_ortu', 'DESC')->first()->tanggungan_ortu;

                $cekIpkTerbesar = Beasiswa::whereHas('mahasiswa', function ($query) use ($data) {
                    $query->where('id_prodi', $data->id);
                })->select('ipk','kategori')
                    ->where('kategori', $kategoriBeasiswa->kategori)
                    ->orderBy('ipk', 'DESC')->first()->ipk;

                $beasiswaDiterima = Beasiswa::with('mahasiswa')->whereHas('mahasiswa', function ($query) use ($data){
                    $query->where('id_prodi', $data->id);
                })->select('status','kategori','id',
                    DB::raw(str_replace(".", "", $cekPenghasilanTerkecil) . '/ (replace(penghasilan_ortu,".","")) * (0.2) as skorPenghasilan'),
                    DB::raw('(round(tanggungan_ortu /' . $cekTanggunganTerbesar . ', 2) ) * (0.2) as skorTanggungan'),
                    DB::raw('(ipk / ' . $cekIpkTerbesar . ') * 0.6  as skorIpk'),
                    DB::raw('SUM(
            CAST(' . str_replace(".", "", $cekPenghasilanTerkecil) . '/ (replace(penghasilan_ortu,".","")) * 0.2 as decimal(5, 2))
            + CAST((round(tanggungan_ortu /' . $cekTanggunganTerbesar . ', 2) ) * 0.2 as decimal(5, 2))
            + ((ipk / ' . $cekIpkTerbesar . ') * 0.6)
            ) * 100 as total'))
                    ->where('kategori', $kategoriBeasiswa->kategori)
                    ->orderBy('total', 'ASC')
                    ->groupBy('penghasilan_ortu', 'tanggungan_ortu','status','ipk','id','kategori')
                    ->limit($data->kuota_beasiswa - $request->kuota_beasiswa)->get();
//                dd($beasiswaDiterima);
                foreach ($beasiswaDiterima as $diterima){
                    Beasiswa::find($diterima->id)->update(['status' => 0]);
                }
            }
        }else{
            Beasiswa::whereHas('mahasiswa', function ($query) use ($data) {
                $query->where('id_prodi', $data->id);
            })->where('status', 0)->update(['status' => null]);
        }

//        dd($ketegoriBeasiswas);


        $data->nama = $request->nama;
        $data->email = $request->email;
        $data->no_hp = $request->no_hp;
        $data->password = Hash::make($request->password);
        $data->program_study = $request->program_study;
        $data->kuota_beasiswa = $request->kuota_beasiswa;
        $logo = $request->file('logo');
        if ($logo){
            $filename        = time().'.'. $logo->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/admin prodi');
            $logo->move($destinationPath, $filename);
            $data->logo = $filename;
        }else{
            $data->logo = $request->old_logo;
        }
        $data->update();

        return redirect()->route('prodi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Prodi::find($id);
        $data->delete();
        return redirect()->route('prodi.index');

    }
}
