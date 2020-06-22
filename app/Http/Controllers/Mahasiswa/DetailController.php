<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Beasiswa;
use App\Http\Controllers\Controller;
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
        $user = Auth::guard('mahasiswa')->user();
        return view('pages.mahasiswa.detail', compact('user'));
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

        $data = new Beasiswa();
        $data->id_mahasiswa = Auth::guard('mahasiswa')->user()->id;
        $data->jenis_kelamin = $request->jenis_kelamin ? 'Laki-laki' : 'Perempuan';
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
        $data->scan_khs = $filename_khs;
        $data->scan_kk = $filename_kk;
        $data->scan_krs = $filename_krs;
        $data->scan_penghasilan = $filename_penghasilan;
        $data->scan_bt = $filename_bt;
        $data->save();

        return  redirect()->route('mahasiswa.dashboard')->with('success', 'Data Tersimpan');

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
