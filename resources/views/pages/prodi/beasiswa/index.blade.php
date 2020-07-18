@extends('templates.prodi')
<head>
    <title>BEASISWA PHB | Data Beasiswa</title>
</head>
@section('content')
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area">
                <div class="row">
                    <div class="col-xl-6 col-md-6 col-sm-6 col-6">
                        <h5>Data Beasiswa </h5>
                    </div>
                    <div class="col-xl-6 col-md-6 col-sm-6 col-6">
                        <form method="get" action="{{route('prodi.beasiswa.filter')}}">

                            <select id="select-tahun-akademik" class="form-control-sm col-sm-6 float-right text-primary"
                                    name="tahun_akademik" required>
                                <option value="">...</option>
                                <option {{request()->query('tahun_akademik') === '2022/2023 - Genap' ? 'selected' : ''}}>2022/2023 - Genap</option>
                                <option {{request()->query('tahun_akademik') === '2022/2023 - Ganjil' ? 'selected' : ''}}>2022/2023 - Ganjil</option>
                                <option {{request()->query('tahun_akademik') === '2021/2022 - Genap' ? 'selected' : ''}}>2021/2022 - Genap</option>
                                <option {{request()->query('tahun_akademik') === '2021/2022 - Ganjil' ? 'selected' : ''}}>2021/2022 - Ganjil</option>
                                <option {{request()->query('tahun_akademik') === '2020/2021 - Genap' ? 'selected' : ''}}>2020/2021 - Genap</option>
                                <option {{request()->query('tahun_akademik') === '2020/2021 - Ganjil' ? 'selected' : ''}}>2020/2021 - Ganjil</option>
                                <option {{request()->query('tahun_akademik') === '2019/2020 - Genap' ? 'selected' : ''}}>2019/2020 - Genap</option>
                                <option {{request()->query('tahun_akademik') === '2019/2020 - Ganjil' ? 'selected' : ''}}>2019/2020 - Ganjil</option>
                            </select>
                            <button type="submit" class="btn btn-primary float-right mr-2 py-1">Seleksi</button>
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
                            {{--<th>Kategori</th>--}}
                            <th>Tahun Akademik</th>
                            <th>Action</th>
                            <th>Status</th>
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
                                {{--<td>{{$data->kategori}}</td>--}}
                                <td>{{$data->tahun_akademik}}</td>
                                <td>
                                    <div class="icon-container">
                                        <a href="{{route('beasiswas.detail',$data->id)}}"
                                           class="btn btn-warning btn-sm ">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                            <span class="icon-name">
                                                     Lihat</span>
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <label class="switch s-icons s-outline s-outline-success mr-2">
                                        @if($data->status === 1)
                                            <button class="btn btn-success" data-target="#modalPembatalan{{$data->id}}" data-toggle="modal">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-check"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg>
                                            </button>
                                            @elseif($data->status === 0)
                                            <button class="btn btn-danger">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-octagon"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                                            </button>
                                            @else
                                        <button class="btn btn-info" data-target="#modalPersetujuan{{$data->id}}" data-toggle="modal">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                                        </button>
                                            @endif
                                    </label>
                                </td>
                            </tr>

                            <!-- Modal Persetujuan -->
                            <div class="modal fade" id="modalPersetujuan{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            <h5><b>Beasiswa untuk {{$data->mahasiswa->nama}}</b></h5>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Ok</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="modalPembatalan{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger">
                                            <h5 class="modal-title text-white" id="exampleModalLabel">Konfirmasi Pembatalan Beasiswa</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{route('beasiswa.pembatalan', $data->id)}}" method="post">
                                            @csrf
                                            @method('PATCH')
                                            <div class="modal-body">
                                                <h5><b>Beasiswa untuk {{$data->mahasiswa->nama}}</b></h5>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
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
    </div>


    <script>

        const tabelBeasiswa = document.querySelector('#tabel-beasiswa');
        const selectTahunAkademik = document.querySelector('#select-tahun-akademik');
        const url = '{{config('app.url')}}';
        const token = document.querySelector('meta[name="csrf-token"]');
        console.log(token.content);

        selectTahunAkademik.addEventListener('change', async function () {
            const body = {tahun_akademik: this.value}
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
            data.map((beasiswa,i) => tr += show(beasiswa, i));
            tabelBeasiswa.innerHTML = tr
        })

        function show(beasiswa, i) {
            return `
             <tr>
                <td class="checkbox-column text-center">${i + 1}</td>
                    <td class="text-center">
                      <span><img src="${url}uploads/foto/${beasiswa.foto}" class="profile-img" height="75" width="75" alt="avatar"></span>
                        </td>
                       <td>${beasiswa.mahasiswa.nim}</td>
                         <td>${beasiswa.mahasiswa.nama}</td>
                                {{-- <td>{{$data->mahasiswa->tempat_lahir}}, {{$data->mahasiswa->tanggal_lahir}}</td>--}}
                            <td>${beasiswa.mahasiswa.prodi.program_study}</td>
                                <td>${beasiswa.email}</td>
                                <td>${beasiswa.kategori}</td>
                                <td>
                                    <div class="icon-container">
                                         <a href="${url}prodi/beasiswa/detail/${beasiswa.id}"
                                            class="btn btn-warning btn-sm ">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                            <span class="icon-name">
                                                     Lihat</span>
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <label class="switch s-icons s-outline s-outline-success mr-2">
                                            ${beasiswa.status === 1 ? `
                                            <button class="btn btn-success" data-target="#modalPembatalan${beasiswa.id}" data-toggle="modal">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-check"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg>
                                            </button>
                                            ` : ''}
                                             ${beasiswa.status == 0 ? `<button class="btn btn-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-octagon"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                                        </button>` : ''}
                                             ${beasiswa.status === null ? `
                                             <button class="btn btn-info" data-target="#modalPersetujuan${beasiswa.id}" data-toggle="modal">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                                        </button>
                                            ` : ''}

            </label>
        </td>
    </tr>
`
        }
    </script>
@endsection
