@extends('templates.admin')
<title>BEASISWA PHB | Data Kategori</title>
@section('content')
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-6">
                            <h4>Data Kategori Beasiswa</h4><br>
                        </div>
                        <div class="col-6">
                            <div class="icon-container">
                                <a type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle">
                                        <circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg><span class="icon-name"></span>
                                    Tambah Data</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive mb-4">
                    <table id="style-3" class="table style-3 table-hover">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kategori</th>
                            <th>Tahun Akademik</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Hapus</th>
                        </tr>
                        </thead>
                        <tbody>
                       @foreach($datas as $data)
                            <tr>
                                <td>{{$data->id}}</td>
                                <td>{{$data->kategori}}</td>
                                <td>{{$data->tahun_akademik}}</td>
                                <td>{!! $data->status ? '<span class="badge badge-success"> Aktif </span>' : '<span class="badge badge-danger"> Tidak aktif </span>'!!}</td>
                                <td>
                                    <div class="icon-container">
                                        <a type="button" data-toggle="modal" data-target="#exampleModalEdit{{$data->id}}" class="btn btn-warning btn-sm ">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg><span class="icon-name"></span>
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div class="icon-container">
                                        <a href="{{route('kategori.destroy', $data->id)}}" onclick="return confirm('Apakah Anda Akan Menghapus Data Ini ?')" class="btn btn-danger btn-sm ">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg><span class="icon-name">
                                            </span>
                                        </a>
                                    </div>
                                </td>
                            </tr>

                            {{--Modal Edit--}}
                            <div class="modal fade" id="exampleModalEdit{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('kategori.update', $data->id)}}" method="post">
                                                @csrf
                                                @method('PATCH')
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Kategori</label>
                                                    <div class="col-sm-10">
                                                        <select name="kategori" class="form-control  basic" required>
                                                            <option {{$data->kategori === 'Beasiswa Bidikmisi' ? 'selected' : '' }}>Beasiswa Bidikmisi</option>
                                                            <option {{$data->kategori === 'Beasiswa Peningkatan Prestasi Akademik (PPA)' ? 'selected' : '' }}>Beasiswa Peningkatan Prestasi Akademik (PPA)</option>
                                                            <option {{$data->kategori === 'Beasiswa Belajar Mahasiswa (BBM)' ? 'selected' : '' }} >Beasiswa Belajar Mahasiswa (BBM)</option>
                                                            <option {{$data->kategori === 'Lainnya...' ? 'selected' : '' }}>Lainnya...</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Tahun Akademik</label>
                                                    <div class="col-sm-10">
                                                        <select name="tahun_akademik" class="form-control  basic" required>
                                                            <option {{$data->tahun_akademik === '2022/2023 - Genap' ? 'selected' : '' }}>2022/2023 - Genap</option>
                                                            <option {{$data->tahun_akademik === '2022/2023 - Ganjil' ? 'selected' : '' }}>2022/2023 - Ganjil</option>
                                                            <option {{$data->tahun_akademik === '2021/2022 - Genap' ? 'selected' : '' }}>2021/2022 - Genap</option>
                                                            <option {{$data->tahun_akademik === '2021/2022 - Ganjil' ? 'selected' : '' }}>2021/2022 - Ganjil</option>
                                                            <option {{$data->tahun_akademik === '2020/2021 - Genap' ? 'selected' : '' }}>2020/2021 - Genap</option>
                                                            <option {{$data->tahun_akademik === '2020/2021 - Ganjil' ? 'selected' : '' }}>2020/2021 - Ganjil</option>
                                                            <option {{$data->tahun_akademik === '2019/2020 - Genap' ? 'selected' : '' }}>2019/2020 - Genap</option>
                                                            <option {{$data->tahun_akademik === '2019/2020 - Ganjil' ? 'selected' : '' }}>2019/2020 - Ganjil</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Status</label>
                                                    <div class="col-sm-10">
                                                        <label class="switch s-icons s-outline s-outline-success mr-2">
                                                            <input type="checkbox" name="status" {{$data->status ? 'checked' : ''}}>
                                                            <span class="slider round"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>Batal</button>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
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
    </div>
{{--Modal Kategori--}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                </div>
                <div class="modal-body">
                    <form action="{{route('kategori.store')}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Kategori</label>
                            <div class="col-sm-10">
                                <select name="kategori" class="form-control  basic" required>
                                    <option selected="selected">Pilih...</option>
                                    <option>Beasiswa Bidikmisi</option>
                                    <option>Beasiswa Peningkatan Prestasi Akademik (PPA)</option>
                                    <option>Beasiswa Belajar Mahasiswa (BBM)</option>
                                    <option>Lainnya...</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tahun Akademik</label>
                            <div class="col-sm-10">
                                <select name="tahun_akademik" class="form-control  basic" required>
                                    <option selected="selected">Pilih...</option>
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
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- End Modal Kategori--}}


    {{--End Modal Edit--}}
@endsection
