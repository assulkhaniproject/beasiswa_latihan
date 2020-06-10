@extends('templates.admin')
<head>
    <title>BEASISWA PHB | Admin Prodi</title>
</head>
@section('content')
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-6">
                            <h4>Data Admin Prodi</h4>
                        </div>
                        <div class="col-6">
                            <div class="icon-container">
                            <a href="{{route('prodi.create')}}" class="btn btn-primary float-right mr-3 mt-2 "><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg><span class="icon-name"></span>
                                Tambah Data</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="table-responsive mb-4">
                        <table id="style-3" class="table style-3 table-hover">
                            <thead>
                            <tr>
                                <th class="checkbox-column text-center"> No</th>
                                <th class="text-center">Image</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No. Hp</th>
                                <th>Program Study</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($datas as $data)
                                <tr>
                                    <td class="checkbox-column text-center"> {{$loop->iteration}}</td>
                                    <td class="text-center">
                                        <span><img src="{{asset('uploads/admin prodi/'.$data->logo)}}" class="profile-img" height="75" width="75"
                                                   alt="avatar"></span>
                                    </td>
                                    <td>{{$data->nama}}</td>
                                    <td>{{$data->email}}</td>
                                    <td>{{$data->no_hp}}</td>
                                    <td>{{$data->program_study}}</td>
                                    <td>
                                        <div class="icon-container">
                                            <a href="{{route('prodi.edit',$data->id)}}" class="btn btn-warning btn-sm ">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg><span class="icon-name">
                                                     Edit</span>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="icon-container">
                                            <a href="{{route('prodi.destroy',$data->id)}}" onclick="return confirm('Apakah Anda Akan Menghapus Data Ini ?')" class="btn btn-danger btn-sm ">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg><span class="icon-name">
                                                         Delete</span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
