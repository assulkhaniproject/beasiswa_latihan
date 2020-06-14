@extends('templates.admin')
<head>
    <title>BEASISWA PHB | Data Beasiswa</title>
</head>
@section('content')
    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area">
                <div class="row">
                    <div class="col-xl-6 col-md-6 col-sm-6 col-6">
                        <h5>Data Beasiswa</h5>
                    </div>
                    <div class="col-xl-6 col-md-6 col-sm-6 col-6 text-right">
                        <a href="{{route('mahasiswa.create')}}" class="btn btn-primary float-right mr-4">Tambah Data</a>
                    </div>
                </div>
                <div class="table-responsive mb-4 mt-4">
                    <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                        <thead>
                        <tr>
                            <th>NIM</th>
                            <th>Nama </th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>Program Study</th>
                            <th>Angkatan</th>
                            <th>Semester</th>
                            <th>No. Hp</th>
                            <th>Email</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                      {{--  @foreach($datas as $data)
                            <tr>
                                <td>{{$data->nim}}</td>
                                <td>{{$data->nama}}</td>
                                <td>{{$data->tempat_lahir}}</td>
                                <td>{{$data->tanggal_lahir}}</td>
                                <td>{{$data->alamat}}</td>
                                <td>{{$data->prodi->program_study}}</td>
                                <td>{{$data->angkatan}}</td>
                                <td>{{$data->semester}}</td>
                                <td>{{$data->no_hp}}</td>
                                <td>{{$data->email}}</td>
                                <td>
                                    <div class="icon-container">
                                        <a href="{{route('mahasiswa.edit',$data->id)}}" class="btn btn-warning btn-sm ">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg><span class="icon-name">
                                                     Edit</span>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach--}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
