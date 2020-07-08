<?php

namespace App\Http\Controllers\Admin;

use App\Prodi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
            'password' => 'required|min:8',
            'program_study' => 'required:unique:prodi',
            'kuota_beasiswa' => 'required|max:2',
        ]);

        $data = Prodi::find($id);
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
