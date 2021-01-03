<?php

namespace App\Http\Controllers\Prodi;

use App\Beasiswa;
use App\Http\Controllers\Controller;
use App\Kategori;
use App\Prodi;
use Illuminate\Http\Request;
use Auth;
use DB;
use function foo\func;

class BeasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->middleware('auth:prodi');
     }

    public function index()
    {

            $datas = Beasiswa::whereHas('mahasiswa', function ($query){
            $query->where('id_prodi',Auth::guard('prodi')->user()->id);
        })->orderBy('created_at', 'DESC')->get();

        $kategori = Kategori::where('status', true)->first();
        $categories = Kategori::all();
        $prodi = Prodi::all();


        /*        $categories = Kategori::all();*/
        return view('pages.prodi.beasiswa.index', compact('datas', 'kategori', 'categories', 'prodi'));
    }


    public function filterAkademik(Request $request){
//        $tahun_akademik = $request->k;
        $kategori = Kategori::where('kategori', $request->kategori)->first()->kategori;


        if($kategori){
            $datas = Beasiswa::with(['mahasiswa' => function($query){
                $query->with('prodi');
            }])->whereHas('mahasiswa', function ($query){
                $query->where('id_prodi',Auth::guard('prodi')->user()->id);
            })->where('kategori', $kategori)
                ->orderBy('created_at', 'DESC')->get();

            return $datas;
        }else{
            $datas = Beasiswa::with('mahasiswa')->whereHas('mahasiswa', function ($query){
                $query->with('prodi')->where('id_prodi',Auth::guard('prodi')->user()->id);
            })->orderBy('created_at', 'DESC')->get();

            return $datas;
        }

    }

    public function filter(Request $request){
        $kategori = request()->get('kategori');
//        dd($kategori);

        $tahun_akademik = Beasiswa::where('kategori', $kategori)->first()->tahun_akademik;
        $categories = Kategori::all();


        $beasiswa = Beasiswa::whereHas('mahasiswa', function ($query) {
            $query->where('id_prodi', Auth::guard('prodi')->user()->id);
        })->where('tahun_akademik', $tahun_akademik)
            ->where('kategori', $kategori)
            ->get();
//        dd($beasiswa);
        if(count($beasiswa) > 0) {
            $kuota = Auth::guard('prodi')->user()->kuota_beasiswa;
            $cekPenghasilanTerkecil = Beasiswa::whereHas('mahasiswa', function ($query) {
                $query->where('id_prodi', Auth::guard('prodi')->user()->id);
            })->select('penghasilan_ortu')
                ->where('tahun_akademik', $tahun_akademik)
                ->where('kategori', $kategori)
                ->orderBy('penghasilan_ortu', 'ASC')->first()->penghasilan_ortu;

            $cekTanggunganTerbesar = Beasiswa::whereHas('mahasiswa', function ($query) {
                $query->where('id_prodi', Auth::guard('prodi')->user()->id);
            })->select('tanggungan_ortu')
                ->where('tahun_akademik', $tahun_akademik)
                ->where('kategori', $kategori)
                ->orderBy('tanggungan_ortu', 'DESC')->first()->tanggungan_ortu;

            $cekIpkTerbesar = Beasiswa::whereHas('mahasiswa', function ($query) {
                $query->where('id_prodi', Auth::guard('prodi')->user()->id);
            })->select('ipk')
                ->where('tahun_akademik', $tahun_akademik)
                ->orderBy('ipk', 'DESC')->first()->ipk;

            $datas = $cekIpkTerbesar = Beasiswa::with('mahasiswa')->whereHas('mahasiswa', function ($query) {
                $query->where('id_prodi', Auth::guard('prodi')->user()->id);
            })->select('id_mahasiswa', 'email', 'id', 'foto','status','kategori',
                DB::raw(str_replace(".", "", $cekPenghasilanTerkecil) . '/ (replace(penghasilan_ortu,".","")) * (0.2) as skorPenghasilan'),
                DB::raw('(round(tanggungan_ortu /' . $cekTanggunganTerbesar . ', 2) ) * (0.2) as skorTanggungan'),
                DB::raw('(ipk / ' . $cekIpkTerbesar . ') * 0.6  as skorIpk'),
                DB::raw('SUM(
            CAST(' . str_replace(".", "", $cekPenghasilanTerkecil) . '/ (replace(penghasilan_ortu,".","")) * 0.2 as decimal(5, 2))
            + CAST((round(tanggungan_ortu /' . $cekTanggunganTerbesar . ', 2) ) * 0.2 as decimal(5, 2))
            + ((ipk / ' . $cekIpkTerbesar . ') * 0.6)
            ) * 100 as total'))
                ->where('tahun_akademik', $tahun_akademik)
                ->where('kategori', $kategori)
                ->orderBy('total', 'DESC')
                ->groupBy('id_mahasiswa', 'penghasilan_ortu', 'tanggungan_ortu','kategori','status', 'ipk', 'email', 'id', 'foto')
                ->limit($kuota)
                ->get();

//            dd($datas);

            return view('pages.prodi.beasiswa.index', compact('datas', 'kategori','categories'));
        }

        $datas = $beasiswa;
        return view('pages.prodi.beasiswa.index', compact('datas', 'kategori','categories'))->with('message','Data beasiswa tidak ditemukan');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $beasiswa = Beasiswa::find($id);
        $kategori = Kategori::where('status', true)->first();
        return view('pages.prodi.beasiswa.detail', compact('beasiswa', 'kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $beasiswa = Beasiswa::find($id);
        $beasiswa->update(['status' => null]);
        $beasiswaDitolak = Beasiswa::whereHas('mahasiswa', function ($query){
            $query->where('id_prodi', Auth::guard('prodi')->user()->id);
        })->where('tahun_akademik',$beasiswa->tahun_akademik)->where('kategori', $beasiswa->kategori)->where('status', 0);
        $beasiswaDitolak->update(['status' => null]);
        return  redirect()->back()->with('Pembatalan beasiswa berhasil');

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
        $beasiswa = Beasiswa::find($id);
        $kuota = $beasiswa->mahasiswa->prodi->kuota_beasiswa;

            $beasiswa->update(['status' => 1]);
            $beasiswaDikonfirmasi = Beasiswa::where('tahun_akademik',$beasiswa->tahun_akademik)->where('kategori', $beasiswa->kategori)
            ->where('status', 1)->get();

            if(count($beasiswaDikonfirmasi) == $kuota){
                $beasiswaMenunggu = Beasiswa::whereHas('mahasiswa', function ($query){
                    $query->where('id_prodi', Auth::guard('prodi')->user()->id);
                })->where('tahun_akademik',$beasiswa->tahun_akademik)->where('kategori', $beasiswa->kategori)->where('status', null);

//                dd($beasiswaMenunggu->get());
                $beasiswaMenunggu->update(['status' => 0]);
            }

            return  redirect()->back()->with('Konfirmasi beasiswa berhasil');

//        dd($beasiswaMenunggu);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function filtering(Request $request)
    {

        $reqData = explode(',', $request->kategori);
        $kat = $reqData[0];
        $ta = $reqData[1];
        $id_prodi = Auth::guard('prodi')->user()->id;

        $datas = Beasiswa::where('kategori', $kat)->where('tahun_akademik', $ta)->whereHas('mahasiswa', function ($query) use ($id_prodi){
            $query->where('id_prodi', $id_prodi);
        })->orderBy('created_at', 'DESC')->get();
//        dd($datas);
        if($request->status != 'all' && $request->semester > 0){
            $datas = Beasiswa::where('kategori', $kat)->where('tahun_akademik', $ta)
            ->where('semester', $request->semester)->where('status', $request->status)
                ->whereHas('mahasiswa', function ($query) use ($id_prodi){
                    $query->where('id_prodi', $id_prodi);
                })->orderBy('created_at', 'DESC')->get();
//            dd($datas);
        }elseif($request->status != 'all'){
            $datas = Beasiswa::where('kategori', $kat)->where('tahun_akademik', $ta)
                ->where('status', $request->status)->whereHas('mahasiswa', function ($query) use ($id_prodi){
                    $query->where('id_prodi', $id_prodi);
                })->orderBy('created_at', 'DESC')->get();
        }elseif ($request->semester > 0){
            $datas = Beasiswa::where('kategori', $kat)->where('tahun_akademik', $ta)
                ->where('semester', $request->semester)
                ->whereHas('mahasiswa', function ($query) use ($id_prodi){
                    $query->where('id_prodi', $id_prodi);
                })->orderBy('created_at', 'DESC')->get();
        }

//        dd($datas);

        $kategori = Kategori::where('status', true)->first();
        $categories = Kategori::all();
        $prodi = Prodi::all();


        /*        $categories = Kategori::all();*/
        return view('pages.prodi.beasiswa.index', compact('datas', 'kategori', 'categories', 'prodi'));


    }
}
