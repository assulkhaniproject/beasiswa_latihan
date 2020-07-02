<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\MahasiswaImport;
use App\Mahasiswa;
use Illuminate\Http\Request;
use App\Prodi;
use DB;
use Excel;

class MahasiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Mahasiswa::all();
        $prodi = Prodi::all();
        return view('pages.admin.mahasiswa.index', compact(['datas', 'prodi']));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prodi= Prodi::all();
        return view('pages.admin.mahasiswa.create',compact('prodi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $rule = [
            'nim' => 'required|string|min:8|max:8|unique:mahasiswa',
            'nama' => 'required|min:3',
            'tempat_lahir' => 'required|min:5',
            'tanggal_lahir' => 'required',
            'alamat' => 'required|min:5',
            'angkatan' => 'required|min:4',
            'jenis_kelamin' => 'required|max:9',
            'no_hp' => 'required|min:11|max:13|unique:mahasiswa',
            'jalur' => 'required',
            'email' => 'required|unique:mahasiswa'
        ];
        $message = [
            'required' => 'Isi bidang ini.',
            'nama.min' => 'Nama minimal 3 huruf.',
            'tempat_lahir.min' => 'Tempat Lahir Minimal 5 Huruf',
            'alamat.min' => 'Alamat Minimal 5 Huruf',
            'angkatan.min' => 'Angkatan Minimal 4 Huruf',
            'jenis_kelamin.max' => 'Semester Maximal 9 Huruf',
            'nim.uniwue' => 'Nim Sudah Terdaftar',
            'no_hp.unique' => 'No. Hp Sudah Terdaftar',
            'email.unique' => 'Email Sudah Terdaftar'
        ];
        $this->validate($request, $rule, $message);

        Mahasiswa::create([
            'id_prodi' => $request->program_study,
            'nim' => $request->nim,
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'angkatan' => $request->angkatan,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'jalur' => $request->jalur,
            'password' => bcrypt($request->nim)
        ]);
        return redirect()->route('mahasiswa.index');



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
        $datas = Mahasiswa::find($id);
        return view('pages.admin.mahasiswa.edit', compact('datas'));
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
            'nim' => 'required',
            'program_study' => 'required:unique:prodi',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'angkatan' => 'required',
            'no_hp' => 'required|max:13',
            'email' => 'required',
            'jalur' => 'required'
        ]);

        $data = Mahasiswa::find($id);
        $data->nama = $request->nama;
        $data->nim = $request->nim;
        $data->program_study = $request->program_study;
        $data->tempat_lahir = $request->tempat_lahir;
        $data->tanggal_lahir = $request->tanggal_lahir;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->alamat = $request->alamat;
        $data->angkatan = $request->angkatan;
        $data->no_hp = $request->no_hp;
        $data->email = $request->email;
        $data->jalur = $request->jalur;

        $data->update();
        return redirect()->route('mahasiswa.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Mahasiswa::find($id);
        $data->delete();
        return redirect()->route('mahasiswa.index');
    }

    public function import(Request $request)
    {
        $id_prodi = $request->program_study;
        Excel::import(new MahasiswaImport($id_prodi), $request->file('import'));
        return redirect()->back();
    }
}
