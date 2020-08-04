@extends('templates.admin')
<head>
    <title>BEASISWA PHB | Data Mahasiswa</title>
</head>
@section('content')
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
            <div class="statbox widget box box-shadow">
            {{--<div class="widget-content widget-content-area">--}}
                <div class="row">
                    <div class="col-xl-6 col-md-6 col-sm-6 col-6">
                        <h5 class="text-primary"><b>Data Mahasiswa</b></h5>
                    </div>
                    <div class="col-xl-6 col-md-6 col-sm-6 col-6 text-right">
                        <a href="{{route('mahasiswa.create')}}" class="btn btn-primary float-right mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-file-plus">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                <polyline points="14 2 14 8 20 8"></polyline>
                                <line x1="12" y1="18" x2="12" y2="12"></line>
                                <line x1="9" y1="15" x2="15" y2="15"></line>
                            </svg>
                            Tambah Data</a>
                        <!-- Button trigger modal -->
                        <button name="upload" type="button" class="btn btn-primary float-right mr-2" data-toggle="modal"
                                data-target="#importexcel">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-download">
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                <polyline points="7 10 12 15 17 10"></polyline>
                                <line x1="12" y1="15" x2="12" y2="3"></line>
                            </svg>
                            Import Data
                        </button>
                    </div>
                </div>
                <div class="table-responsive mb-4 mt-4">
                    <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                        <thead>
                        <tr>
                            <th class="checkbox-column text-center"> No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Tanggal Lahir</th>
                            <th>No. Hp</th>
                            <th>Program Studi</th>
                            {{--<th>Email</th>--}}
                            {{--<th>Tempat Lahir</th>--}}
                            {{--<th>Alamat</th>--}}
                            {{--<th>Angkatan</th>--}}
                            <th>Jalur</th>
                            <th>Action</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($datas as $data)
                            <tr>
                                <td class="checkbox-column text-center"> {{$loop->iteration}}</td>
                                <td>{{$data->nim}}</td>
                                <td>{{$data->nama}}</td>
                                <td>{{$data->tanggal_lahir}}</td>
                                <td>{{$data->no_hp}}</td>
                                <td>{{$data->prodi->program_study}}</td>
                                {{--<td>{{$data->email}}</td>--}}
                                {{--<td>{{$data->tempat_lahir}}</td>--}}
                                {{--<td>{{$data->alamat}}</td>--}}
                                {{--<td>{{$data->angkatan}}</td>--}}
                                <td>{{$data->jalur}}</td>
                                <td>
                                    <div class="icon-container">
                                        <a href="{{route('mahasiswa.edit',$data->id)}}" class="btn btn-primary btn-sm ">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round"
                                                 class="feather feather-eye">
                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                <circle cx="12" cy="12" r="3"></circle>
                                            </svg>
                                            <span class="icon-name">
                                                     Lihat</span>
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div class="icon-container">
                                        <a href="{{route('mahasiswa.destroy',$data->id)}}"
                                           onclick="return confirm('Apakah Anda Akan Menghapus Data Ini ?')"
                                           class="btn btn-danger btn-sm ">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round"
                                                 class="feather feather-trash-2">
                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                <path
                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                            </svg>
                                            <span class="icon-name">
                                                         Hapus</span>
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
    <!-- Modal -->
    <div class="modal fade" id="importexcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Import Data Excel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('mahasiswa.import') }}" enctype="multipart/form-data" method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group row mr-lg-5">
                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm ">Program
                                Study</label>
                            <div class="col-sm-8">
                                <select name="program_study" class="form-control form-small" required>
                                    <option selected="selected" value="">...</option>
                                    @foreach($prodi as $p)
                                        <option
                                            value="{{$p->id}}" {{$p->id == old('program_study') ? 'selected' : ''}} >
                                            {{$p->program_study}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="custom-file mb-4">
                            <input name="import" type="file"
                                   accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
                                   class="custom-file-input" id="import" required>
                            <label class="custom-file-label" for="customFile">Choose File Excel</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cacel-12"></i>Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
