<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Prodi;
use App\Beasiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
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
        return view('pages.admin.dashboard');
    }

    public function chart(){
        $prodi = Prodi::select('id','program_study')->withCount(['mahasiswa' => function ($query){
            $query->whereHas('beasiswa');
        }])->orderBy('mahasiswa_count', 'DESC')->get();

        return $prodi;
    }

    public function notify()
    {
        //$authProdi = Auth::guard('prodi')->user()->id;
        // $beasiswas = Beasiswa::whereHas('mahasiswa', function($mhs) use($authProdi) {
        //     $mhs->where('id_prodi', $authProdi);
        // })->where('status', null)->get();

        $beasiswas = Beasiswa::where('status', null)->get();

        $item = [
            'beasiswas' => $beasiswas,
            'count' => $beasiswas->count()
        ];
        return $item;
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
