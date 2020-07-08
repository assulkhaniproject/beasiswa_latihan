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
                                <td>
                                    <div class="icon-container">
                                        <a href="{{route('beasiswas.detail',$data->id)}}"
                                           class="btn btn-warning btn-sm ">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round"
                                                 class="feather feather-edit">
                                                <path
                                                    d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                <path
                                                    d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                            </svg>
                                            <span class="icon-name">
                                                     View</span>
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <label class="switch s-icons s-outline s-outline-success mr-2">
                                        <input type="checkbox" checked>
                                        <span class="slider round"></span>
                                    </label>
                                </td>
                            </tr>
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
                                <td>
                                    <div class="icon-container">
                                         <a href="${url}prodi/beasiswa/detail/${beasiswa.id}"
                                           class="btn btn-warning btn-sm ">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round"
                                                 class="feather feather-edit">
                                                <path
                                                    d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                <path
                                                    d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                            </svg>
                                            <span class="icon-name">
                                                     View</span>
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <label class="switch s-icons s-outline s-outline-success mr-2">
                                        <input type="checkbox" checked>
                                        <span class="slider round"></span>
                                    </label>
                                </td>
                            </tr>
            `
        }
    </script>
@endsection
