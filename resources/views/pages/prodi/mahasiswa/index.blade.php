@extends('templates.prodi')
<head>
    <title>BEASISWA PHB | Data Mahasiswa</title>
</head>
@section('content')
    <div class="row layout-top-spacing">

        <div class="col-12 layout-spacing">
            <div class="widget-content widget-content-area">
                <div class="row">
                    <div class="col-xl-6 col-md-6 col-sm-6 col-6">
                        <h5>Data Mahasiswa</h5>
                    </div>
                    <div class="col-xl-6 col-md-6 col-sm-6 col-6 text-right">
                        <a href="{{route('mahasiswa.create')}}" class="btn btn-primary float-right mr-4">Tambah Data</a>
                    </div>
                </div>
                <div class="table-responsive mb-4 mt-4">
                    <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                        <thead>
                        <tr>
                            <th>Nim</th>
                            <th>Nama</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>Angkatan</th>
                            <th>Semester</th>
                            <th>No.HP</th>
                            <th>Email</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($datas as $data)
                        <tr>
                            <td>{{$data->nim}}</td>
                            <td>{{$data->nama}}</td>
                            <td>{{$data->tempat_lahir}}</td>
                            <td>{{$data->tanggal_lahir}}</td>
                            <td>{{$data->alamat}}</td>
                            <td>{{$data->angkatan}}</td>
                            <td>{{$data->semester}}</td>
                            <td>{{$data->no_hp}}</td>
                            <td>{{$data->email}}</td>
                            <td>
                                <div class="d-flex">
                                    <div class="usr-img-frame mr-2 rounded-circle">
                                        <img alt="avatar" class="img-fluid rounded-circle" src="assets/img/boy.png">
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-dark btn-sm">Open</button>
                                    <button type="button" class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuReference1">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Separated link</a>
                                    </div>
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
@endsection
