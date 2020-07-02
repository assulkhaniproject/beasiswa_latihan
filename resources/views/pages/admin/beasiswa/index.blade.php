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
                    <div class="col-xl-6 col-md-6 col-sm-6 col-6">
                        <select class="form-control-sm col-sm-4 float-right text-primary">
                            <option>Default select</option>
                            <option>Default select</option>
                            <option>Default select</option>
                        </select>
                        <button class="btn btn-outline-dark text-primary mb-2 py-1 float-right mr-2">Primary</button>                    </div>
                </div>
                <div class="table-responsive mb-4 mt-4">
                    <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                        <thead>
                        <tr>
                            <th class="checkbox-column text-center"> No</th>
                            <th class="text-center">Image</th>
                            <th>NIM</th>
                            <th>Nama </th>
                            <th>Program Studi</th>
                            <th>Email</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($datas as $data)
                            <tr>
                                <td class="checkbox-column text-center"> {{$loop->iteration}}</td>
                                <td class="text-center">
                                        <span><img src="{{asset('uploads/foto/'.$data->foto)}}" class="profile-img" height="75" width="75"
                                                   alt="avatar"></span>
                                </td>
                                <td>{{$data->mahasiswa->nim}}</td>
                                <td>{{$data->mahasiswa->nama}}</td>
                               {{-- <td>{{$data->mahasiswa->tempat_lahir}}, {{$data->mahasiswa->tanggal_lahir}}</td>--}}
                                <td>{{$data->mahasiswa->prodi->program_study}}</td>
                                <td>{{$data->email}}</td>
                                <td>
                                    <div class="icon-container">
                                        <a href="{{route('beasiswa.detail',$data->id)}}" class="btn btn-warning btn-sm ">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg><span class="icon-name">
                                                     View</span>
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
@endsection
