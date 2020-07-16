@extends('templates.admin')
<head>
    <title>BEASISWA PHB | Data Beasiswa</title>
</head>
@section('content')
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
            <div class="widget-content widget-content-area">
                <div class="row">
                    <div class="col-xl-6 col-md-6 col-sm-6 col-6">
                        <h5>Data Beasiswa</h5>
                    </div>
                    <div class="col-xl-6 col-md-6 col-sm-6 col-6">
                        <button type="button" class="btn btn-primary py-1 px-4 float-right mr-sm-5 py-2 px-lg-5" data-toggle="modal" data-target="#exampleModal">
                            Filter
                        </button>
                    </div>
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
                                        <a href="{{route('beasiswa.detail',$data->id)}}" class="btn btn-primary btn-sm ">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg><span class="icon-name">
                                                     Lihat</span>
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
        {{--Modal Kategori--}}
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Filter Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <form method="get" action="{{route('beasiswa.filter')}}">
                    <div class="modal-body">
                        <div class="form-group row  mb-4">
                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm text-primary">Tahun Akademik</label>
                            <div class="col-sm-10">
                                <select class="form-control form-control-sm text-primary" name="tahun_akademik" required>
                                    <option value="">...</option>
                                    <option>2022/2023 - Genap</option>
                                    <option>2022/2023 - Ganjil</option>
                                    <option>2021/2022 - Genap</option>
                                    <option>2021/2022 - Ganjil</option>
                                    <option>2020/2021 - Genap</option>
                                    <option>2020/2021 - Ganjil</option>
                                    <option>2019/2020 - Genap</option>
                                    <option>2019/2020 - Ganjil</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row  mb-4">
                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm text-primary">Kategori</label>
                            <div class="col-sm-10">
                            <select class="form-control form-control-sm text-primary" name="kategori" required>
                                <option value="">...</option>
                                <option>Peningkatan Prestasi Akademik (PPA)</option>
                                <option>Bidikmisi</option>
                                <option>Beasiswa Belajar Mahasiswa (BBM)</option>
                                <option>Lainnya...</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group row  mb-4">
                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm text-primary">Program Studi</label>
                            <div class="col-sm-10">
                            <select class="form-control form-control-sm text-primary" name="program_studi">
                                <option selected="selected" value="">Program Studi</option>
                                @foreach($prodi as $p)
                                    <option value="{{$p->id}}" {{$p->id == old('program_study') ? 'selected' : ''}} >{{$p->program_study}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="form-group row  mb-4">
                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm text-primary">Status</label>
                            <div class="col-sm-10">
                                <input class="form-control form-control-sm text-primary" name="status"></input>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cacel-12"></i>Batal</button>
                        <button type="submit" class="btn btn-primary">OK</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        {{--End Modal Kategori--}}
    </div>
@endsection
