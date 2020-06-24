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
            'semester' => 'required|max:1',
            'no_hp' => 'required|min:11|max:13|unique:mahasiswa',
            'email' => 'required|unique:mahasiswa'
        ];
        $message = [
            'required' => 'Isi bidang ini.',
            'nama.min' => 'Nama minimal 3 huruf.',
            'tempat_lahir.min' => 'Tempat Lahir Minimal 5 Huruf',
            'alamat.min' => 'Alamat Minimal 5 Huruf',
            'angkatan.min' => 'Angkatan Minimal 4 Huruf',
            'semester.max' => 'Semester Maximal 1 Huruf',
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
            'semester' => $request->semester,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
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

    public function import(Request $request)
    {
        $id_prodi = $request->program_study;
        Excel::import(new MahasiswaImport($id_prodi), $request->file('import'));
        return redirect()->back();
    }
}
