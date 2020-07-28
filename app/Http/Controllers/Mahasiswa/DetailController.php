<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Beasiswa;
use App\Http\Controllers\Controller;
use App\Kategori;
use App\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        $this->middleware('auth:mahasiswa');
    }

    public function index()
    {
        $user = Auth::user();
        $kategori = Kategori::where('status', true)->first();
        return view('pages.mahasiswa.detail', compact('user', 'kategori'));
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
        $rule = [
            'kategori'=>'required',
            'tahun_akademik'=>'required',
            'agama' => 'required',
            'alamat' => 'required|min:5',
            'kode_pos' => 'required|min:5|max:5',
            'ipk' => 'required|max:4|min:4',
            'semester' => 'required|max:1|min:1',
            'email' => 'required',
            'no_hp' => 'required|min:11|max:13',
            'alamat_ortu' => 'required|min:5',
            'no_hp_ortu' => 'required|min:11|max:13',
            'tanggungan_ortu' => 'required|max:1',
            'pekerjaan_ortu' => 'required|min:5',
            'scan_khs' => 'required|image|max:2048',
            'scan_krs' => 'required|image|max:2048',
            'scan_ktm' => 'required|image|max:2048',
            'scan_ktp' => 'required|image|max:2048',
            'foto' => 'required|image|max:2048',
            'scan_penghasilan' => 'required|image|max:2048',
            'scan_kk' => 'required|image|max:2048',
            'scan_bt' => 'required|image|max:2048',
        ];
        $message = [
            'required' => ':attributes Isi bidang ini.',
            'alamat.min' => 'Alamat Minimal 5 Huruf',
            'kode_pos.max' => 'Kode Pos Maximal 5 Karakter',
            'ipk.max' => 'Masukan IPK Dengan Benar',
            'ipk.min' => 'Masukan IPK Dengan Benar',
            'semester.max' => 'Semester Maximal 1 Karakter',
            'no_hp.unique' => 'No. Hp Sudah Terdaftar',
            'email.unique' => 'Email Sudah Terdaftar',
            'pekerjaan_ortu' => 'Minimal 5 Karakter',
            'alamat_ortu.min' => 'Alamat Minimal 5 Huruf',
            'no_hp_ortu.max' => 'No Hp Maximal 13 Angka',
            'no_hp.max' => 'No Hp Maximal 13 Angka',
            'tanggungan_ortu.max' => 'Salah Menginputkan Jumlah',
            'image' => 'File yang anda pilih salah',
            'scan_khs.max' => 'Gambar KHS maksimal 2 MB'

        ];
        $this->validate($request, $rule, $message);

        $beasiswa = Beasiswa::where('kategori', $request->kategori)
                    ->where('tahun_akademik', $request->tahun_akademik)
                    ->where('id_mahasiswa', Auth::user()->id)
                    ->first();

        if ($beasiswa){
            return redirect()->back()->with('error', 'Anda sudah terdaftar pada beasiswa ini');
        }else{
            try{
                $scan_khs = $request->file('scan_khs');
                $filename_khs = time().'khs'.'.'. $scan_khs->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/khs');
                $scan_khs->move($destinationPath, $filename_khs);

                $scan_krs = $request->file('scan_krs');
                $filename_krs = time().'krs'.'.'. $scan_krs->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/krs');
                $scan_krs->move($destinationPath, $filename_krs);

                $scan_penghasilan = $request->file('scan_penghasilan');
                $filename_penghasilan = time().'penghasilan'.'.'. $scan_penghasilan->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/penghasilan');
                $scan_penghasilan->move($destinationPath, $filename_penghasilan);

                $scan_kk = $request->file('scan_kk');
                $filename_kk = time().'kk'.'.'. $scan_kk->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/kk');
                $scan_kk->move($destinationPath, $filename_kk);

                $scan_bt = $request->file('scan_bt');
                $filename_bt = time().'bt'.'.'. $scan_bt->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/bt');
                $scan_bt->move($destinationPath, $filename_bt);

                $foto = $request->file('foto');
                $filename_foto = time().'foto'.'.'. $foto->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/foto');
                $foto->move($destinationPath, $filename_foto);

                $scan_ktm = $request->file('scan_ktm');
                $filename_ktm =time().'ktm'.'.'. $scan_ktm->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/ktm');
                $scan_ktm->move($destinationPath, $filename_ktm);

                $scan_ktp = $request->file('scan_ktp');
                $filename_ktp =time().'ktp'.'.'. $scan_ktp->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/ktp');
                $scan_ktp->move($destinationPath, $filename_ktp);


                $data = new Beasiswa();
                $data->id_mahasiswa = Auth::user()->id;
                $data->jenis_kelamin = $request->jenis_kelamin;
                $data->kategori = $request->kategori;
                $data->tahun_akademik = $request->tahun_akademik;
                $data->agama = $request->agama;
                $data->alamat = $request->alamat;
                $data->kode_pos = $request->kode_pos;
                $data->ipk = $request->ipk;
                $data->semester = $request->semester;
                $data->email = $request->email;
                $data->no_hp = $request->no_hp;

                $data->nama_ortu = $request->nama_ortu;
                $data->alamat_ortu = $request->alamat_ortu;
                $data->pekerjaan_ortu = $request->pekerjaan_ortu;
                $data->no_hp_ortu = $request->no_hp_ortu;
                $data->penghasilan_ortu = $request->penghasilan_ortu;
                $data->tanggungan_ortu = $request->tanggungan_ortu;

                $data->nama_bank = $request->nama_bank;
                $data->cabang_bank = $request->cabang_bank;
                $data->nama_rek = $request->nama_rek;
                $data->no_rek = $request->no_rek;

                $data->foto = $filename_foto;
                $data->scan_ktm = $filename_ktm;
                $data->scan_ktp = $filename_ktp;
                $data->scan_khs = $filename_khs;
                $data->scan_kk = $filename_kk;
                $data->scan_krs = $filename_krs;
                $data->scan_penghasilan = $filename_penghasilan;
                $data->scan_bt = $filename_bt;
                $data->save();

                return redirect()->route('mahasiswa.dashboard')->with('success', 'Data Tersimpan');
             }catch (\Exception $e){
            dd($e);
            }
        }
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
        //
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
        //
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
}
