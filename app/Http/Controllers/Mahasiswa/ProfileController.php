<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Kategori;
use App\Mahasiswa;
use Illuminate\Http\Request;
use App\Beasiswa;
use Auth;

class ProfileController extends Controller
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
        $kategori = Kategori::where('status', true)->first();
        $beasiswas = Beasiswa::where('id_mahasiswa', Auth::user()->id)->orderBy('id', 'DESC')->paginate(6);
        return view('pages.mahasiswa.profile', compact('beasiswas', 'user', $kategori));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::guard('mahasiswa')->user();
        $datas = Beasiswa::find($id);
        $beasiswas = Beasiswa::where('id_mahasiswa', Auth::user()->id)->orderBy('id', 'DESC')->paginate(6);
        $kategori = Kategori::where('status', true)->first();
        return view('pages.mahasiswa.detail_profile', compact('datas', 'kategori', $beasiswas, 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::guard('mahasiswa')->user();
        $datas = Beasiswa::find($id);
        $beasiswas = Beasiswa::where('id_mahasiswa', Auth::user()->id)->orderBy('id', 'DESC')->paginate(6);
        $kategori = Kategori::where('status', true)->first();
        return view('pages.mahasiswa.edit', compact('datas', 'kategori', $beasiswas, 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
