@extends('templates.prodi')
<head>
    <title>BEASISWA PHB | Data Beasiswa</title>
</head>
@section('content')
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="row">
                    <div class="col-xl-6 col-md-6 col-sm-6 col-6">
                        <h5>Data Beasiswa </h5>
                    </div>
                    <div class="col-xl-6 col-md-6 col-sm-6 col-6">
                        <form method="get" action="{{route('prodi.beasiswa.filter')}}">

                            <select id="select-tahun-akademik" class="form-control-sm col-sm-6 float-right text-primary"
                                    name="kategori" required>
                                <option value="">...</option>
                                @foreach($categories as $item)
                                    <option
                                        value="{{ $item->kategori }}">{{ $item->kategori . " " . $item->tahun_akademik }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-primary float-right mr-1 py-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-edit-3">
                                    <path d="M12 20h9"></path>
                                    <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                                </svg>
                                Seleksi
                            </button>
                            <button type="button" class="btn btn-primary float-right mr-1 py-1" data-toggle="modal"
                                    data-target="#ModalFilter">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-search">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg>
                                Cari Data
                            </button>
                        </form>
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
                            <th>Program Study</th>
                            <th>Email</th>
                            <th>Kategori</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="tabel-beasiswa">
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
                                <td>{{$data->email}}</td>
                                <td>{{$data->kategori}}</td>
                                <td>
                                    @if($data->status == 1)
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
                                            <span class="icon-name">
                                                     Diterima</span>
                                        </button>
                                    @elseif($data->status === null)
                                        <button class="btn btn-info" data-target="#modalPersetujuan{{$data->id}}"
                                                data-toggle="modal">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                 stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                 class="feather feather-check-circle">
                                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                            </svg>
                                            <span class="icon-name">
                                                     Menunggu</span>
                                        </button>
                                    @elseif($data->status == 0)
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
                                            <span class="icon-name">
                                                     Ditolak</span>
                                        </button>

                                        @endif
                                        </label>
                                </td>
                                <td>
                                    <div class="icon-container">
                                        <a href="{{route('beasiswas.detail',$data->id)}}"
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

                            <!-- Modal Persetujuan -->
                            <div class="modal fade" id="modalPersetujuan{{$data->id}}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Beasiswa</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{route('beasiswa.konfirmasi', $data->id)}}" method="post">
                                            @csrf
                                            @method('PATCH')
                                            <div class="modal-body">
                                                <h5><b>Beasiswa Diberikan Untuk {{$data->mahasiswa->nama}}</b></h5>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-warning" data-dismiss="modal">
                                                    Batal
                                                </button>
                                                <button type="submit" class="btn btn-primary">Ok</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="modalPembatalan{{$data->id}}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger">
                                            <h5 class="modal-title text-white" id="exampleModalLabel">Konfirmasi
                                                Pembatalan Beasiswa</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{route('beasiswa.pembatalan', $data->id)}}" method="post">
                                            @csrf
                                            @method('PATCH')
                                            <div class="modal-body">
                                                <h5><b>Pembatalan Beasiswa Untuk {{$data->mahasiswa->nama}}</b></h5>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-warning" data-dismiss="modal">
                                                    Batal
                                                </button>
                                                <button type="submit" class="btn btn-primary">Ok</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{--Modal Filtering--}}

        Basic
        Vertically Centered
        Remove animation
        Optional sizes
        Video
        Animation Style Modal
        Custom
        Basic
        Basic Bootastap 4 Modal.

        <!-- Modal Filtering -->
        <div class="modal fade" id="ModalFilter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Filter Data</h5>
                    </div>
                    <form method="get" action="{{route('beasiswa.filtering')}}">
                        <div class="modal-body">
                            <div class="form-group row  mb-4">
                                <label for="colFormLabelSm"
                                       class="col-sm-2 col-form-label col-form-label-sm text-primary">Kategori</label>
                                <div class="col-sm-10">
                                    <select class="form-control form-control-sm text-primary" name="kategori" required>
                                        <option value="">...</option>
                                        @foreach($categories as $item)
                                            <option
                                                value="{{ $item->kategori.",".$item->tahun_akademik }}">{{ $item->kategori . " " . $item->tahun_akademik }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row  mb-4">
                                <label for="colFormLabelSm"
                                       class="col-sm-2 col-form-label col-form-label-sm text-primary">Status</label>
                                <div class="col-sm-10">
                                    <select class="form-control form-control-sm text-primary" name="status">
                                        <option selected="selected" value="all">Pilih status</option>
                                        <option value="1">Diterima</option>
                                        <option value="0">Ditolak</option>
                                        <option value="">Menunggu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row  mb-4">
                                <label for="colFormLabelSm"
                                       class="col-sm-2 col-form-label col-form-label-sm text-primary">Status</label>
                                <div class="col-sm-10">
                                    <select class="form-control form-control-sm text-primary" name="semester">
                                        <option selected="selected" value="">Pilih Semester</option>
                                        @for($i = 1; $i <= 8; $i++)
                                        <option value="{{$i}}">Semester {{$i}}</option>
                                        @endfor
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
        {{--End Modal Filtering--}}
    </div>


    <script>

        const tabelBeasiswa = document.querySelector('#tabel-beasiswa');
        const selectTahunAkademik = document.querySelector('#select-tahun-akademik');
        const url = '{{config('app.url')}}';
        const token = document.querySelector('meta[name="csrf-token"]');
        console.log(token.content);

        selectTahunAkademik.addEventListener('change', async function () {
            const body = {kategori: this.value}
            const data = await fetch(url + 'prodi/beasiswa/tahun-akademik', {
                headers: {
                    'X-CSRF-TOKEN': token.content,
                    'Content-Type': 'application/json; charset=utf-8'
                },
                method: 'post',
                credentials: "same-origin",
                body: JSON.stringify(body)
            }).then(res => res.json()).then(res => res);

            let tr = ``;
            data.map((beasiswa, i) => tr += show(beasiswa, i));
            tabelBeasiswa.innerHTML = tr
        })

        function show(beasiswa, i) {
            return `
             <tr>
                <td class="checkbox-column text-center">${i + 1}</td>
                    <td class="text-center">
                      <span><img src="{{asset('uploads/foto')}}${'/' + beasiswa.foto}" class="profile-img" height="75" width="75" alt="avatar"></span>
                        </td>
                       <td>${beasiswa.mahasiswa.nim}</td>
                         <td>${beasiswa.mahasiswa.nama}</td>
                                {{-- <td>{{$data->mahasiswa->tempat_lahir}}, {{$data->mahasiswa->tanggal_lahir}}</td>--}}
            <td>${beasiswa.mahasiswa.prodi.program_study}</td>
                                <td>${beasiswa.email}</td>
                                <td>${beasiswa.kategori}</td>
                                <td>
                                            ${beasiswa.status == 1 ? `
                                            <button class="btn btn-success" data-target="#modalPembatalan${beasiswa.id}" data-toggle="modal">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-check"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg><span class="icon-name">
                                                     Diterima</span>
                                            </button>
                                            ` : ''}
                                             ${beasiswa.status == 0 ? `<button class="btn btn-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-octagon"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg><span class="icon-name">
                                                     Ditolak</span>
                                        </button>` : ''}
                                             ${beasiswa.status == null ? `
                                             <button class="btn btn-info" data-target="#modalPersetujuan${beasiswa.id}" data-toggle="modal">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg><span class="icon-name">
                                                     Menunggu</span>
                                        </button>
                                            ` : ''}
                                     </label>
                                    </td>
                                <td>
                                    <div class="icon-container">
                                         <a href="${url}prodi/beasiswa/detail/${beasiswa.id}"
                                            class="btn btn-primary btn-sm ">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                            <span class="icon-name">
                                                     Lihat</span>
                                        </a>
                                    </div>
                                </td>
    </tr>
`
        }
    </script>
@endsection
