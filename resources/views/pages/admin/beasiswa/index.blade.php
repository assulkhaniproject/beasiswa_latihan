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
                        <button type="button" class="btn btn-primary py-1 px-4 float-right mr-sm-5 py-2 px-lg-5"
                                data-toggle="modal" data-target="#exampleModal">
                            Filter
                        </button>
                    </div>
                    <div class="col-xl-6 col-md-6 col-sm-6 col-6">
                        <a href="{{ url("admin/export/excel?kategori="
                        .request()->get('kategori')."&program_studi="
                        .request()->get('program_studi')."&status="
                        .request()->get('status')) }}" class="btn btn-primary py-1 px-4 float-right mr-sm-5 py-2 px-lg-5">
                            Export
                        </a>
                    </div>
                </div>
                <div class="table-responsive mb-4 mt-4">
                    <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                        <thead>
                        <tr>
                            <th class="checkbox-column text-center"> No</th>
                            <th class="text-center">Image</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Program Studi</th>
                            {{--<th>Email</th>--}}
                            <th>Ketegori</th>
                            <th>Tahun Akademik</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($datas as $data)
                            <tr>
                                <td class="checkbox-column text-center"> {{$loop->iteration}}</td>
                                <td class="text-center">
                                        <span><img src="{{asset('uploads/foto/'.$data->foto)}}" class="profile-img"
                                                   height="75" width="75"
                                                   alt="avatar"></span>
                                </td>
                                <td>{{$data->mahasiswa->nim}}</td>
                                <td>{{$data->mahasiswa->nama}}</td>
                                {{-- <td>{{$data->mahasiswa->tempat_lahir}}, {{$data->mahasiswa->tanggal_lahir}}</td>--}}
                                <td>{{$data->mahasiswa->prodi->program_study}}</td>
                                {{--<td>{{$data->email}}</td>--}}
                                <td>{{$data->kategori}}</td>
                                <td>{{$data->tahun_akademik}}</td>
                                <td>
                                    <label class="switch s-icons s-outline s-outline-success mr-2">
                                        @if($data->status === 1)
                                            <button class="btn btn-success" data-target="#modalPembatalan{{$data->id}}"
                                                    data-toggle="modal">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                     class="feather feather-user-check">
                                                    <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                                    <circle cx="8.5" cy="7" r="4"></circle>
                                                    <polyline points="17 11 19 13 23 9"></polyline>
                                                </svg>
                                            </button>
                                        @elseif($data->status === 0)
                                            <button class="btn btn-danger">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                     class="feather feather-x-octagon">
                                                    <polygon
                                                        points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
                                                    <line x1="15" y1="9" x2="9" y2="15"></line>
                                                    <line x1="9" y1="9" x2="15" y2="15"></line>
                                                </svg>
                                            </button>
                                        @else
                                            <button class="btn btn-info" data-target="#modalPersetujuan{{$data->id}}"
                                                    data-toggle="modal">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                     class="feather feather-check-circle">
                                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                                </svg>
                                            </button>
                                        @endif
                                    </label>
                                </td>
                                <td>
                                    <div class="icon-container">
                                        <a href="{{route('beasiswa.detail',$data->id)}}"
                                           class="btn btn-primary btn-sm ">
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
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{--Modal Kategori--}}
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Filter Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <form method="get" action="{{route('beasiswa.filter')}}">
                        <div class="modal-body">
                            {{--                        <div class="form-group row  mb-4">--}}
                            {{--                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm text-primary">Tahun Akademik</label>--}}
                            {{--                            <div class="col-sm-10">--}}
                            {{--                                <select class="form-control form-control-sm text-primary" name="tahun_akademik" required>--}}
                            {{--                                    <option value="">...</option>--}}
                            {{--                                    <option>2022/2023 - Genap</option>--}}
                            {{--                                    <option>2022/2023 - Ganjil</option>--}}
                            {{--                                    <option>2021/2022 - Genap</option>--}}
                            {{--                                    <option>2021/2022 - Ganjil</option>--}}
                            {{--                                    <option>2020/2021 - Genap</option>--}}
                            {{--                                    <option>2020/2021 - Ganjil</option>--}}
                            {{--                                    <option>2019/2020 - Genap</option>--}}
                            {{--                                    <option>2019/2020 - Ganjil</option>--}}
                            {{--                                </select>--}}
                            {{--                            </div>--}}
                            {{--                        </div>--}}

                            <div class="form-group row  mb-4">
                                <label for="colFormLabelSm"
                                       class="col-sm-2 col-form-label col-form-label-sm text-primary">Kategori</label>
                                <div class="col-sm-10">
                                    <select class="form-control form-control-sm text-primary" name="kategori" required>
                                        <option value="">...</option>
                                        @foreach($kategori as $item)
                                            <option
                                                value="{{ $item->id }}">{{ $item->kategori . " " . $item->tahun_akademik }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row  mb-4">
                                <label for="colFormLabelSm"
                                       class="col-sm-2 col-form-label col-form-label-sm text-primary">Program
                                    Studi</label>
                                <div class="col-sm-10">
                                    <select class="form-control form-control-sm text-primary" name="program_studi">
                                        <option selected="selected" value="">Program Studi</option>
                                        @foreach($prodi as $p)
                                            <option
                                                value="{{$p->id}}" {{$p->id == old('program_study') ? 'selected' : ''}} >
                                                {{$p->program_study}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row  mb-4">
                                <label for="colFormLabelSm"
                                       class="col-sm-2 col-form-label col-form-label-sm text-primary">Status</label>
                                <div class="col-sm-10">
                                    <select class="form-control form-control-sm text-primary" name="status">
                                        <option selected="selected" value="all">Status</option>
                                        <option value="1">Diterima</option>
                                        <option value="0">Ditolak</option>
                                        <option value="">Menunggu</option>
                                    </select>
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
