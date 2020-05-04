@extends('templates.admin')

@section('content')

    <div class="row layout-top-spacing">
        <div id="basic" class="col-lg-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Tambah Data</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <form>
                        <div class="form-group row mr-lg-5">
                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm ">Nomor Induk Mahasiswa</label>
                            <div class="col-sm-8">
                                <input name="nim" type="number" class="form-control form-control-sm" id="colFormLabelSm" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row mr-lg-5">
                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm ">Nama Lengkap</label>
                            <div class="col-sm-8">
                                <input name="nama" type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row mr-lg-5">
                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm ">Tempat Lahir</label>
                            <div class="col-sm-8">
                                <input name="tempat_lahir" type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row mr-lg-5">
                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm ">Tanggal Lahir</label>
                            <div class="col-sm-8">
                                <input name="tanggal_lahir" type="date" class="form-control form-control-sm" id="colFormLabelSm" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row mr-lg-5">
                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm ">Alamat</label>
                            <div class="col-sm-8">
                                <textarea name="alamat" type="" class="form-control form-control-sm" id="colFormLabelSm" placeholder=""></textarea>
                            </div>
                        </div>
                        <div class="form-group row mr-lg-5">
                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm ">Program Study</label>
                            <div class="col-sm-8">
                                <select name="program_study" class="form-control form-small">
                                    <option selected="selected">...</option>
                                    <option>Teknik Elektro</option>
                                    <option>Teknik Mesin</option>
                                    <option>Akuntansi</option>
                                    <option>Teknik Komputer</option>
                                    <option>Kebidanan</option>
                                    <option>Farmasi</option>
                                    <option>Teknik Informatika</option>
                                    <option>Perhotelan</option>
                                    <option>Akuntansi Sektor Publik</option>
                                    <option>Teknik Design Komunikasi Visual</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mr-lg-5">
                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm ">Angkatan</label>
                            <div class="col-sm-8">
                                <input name="angkatan" type="number" class="form-control form-control-sm" id="colFormLabelSm" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row mr-lg-5">
                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm ">Semester</label>
                            <div class="col-sm-8">
                                <input name="semester" type="number" class="form-control form-control-sm" id="colFormLabelSm" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row mr-lg-5">
                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm ">No. Hp</label>
                            <div class="col-sm-8">
                                <input name="no_hp" type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row mr-lg-5">
                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm ">Email</label>
                            <div class="col-sm-8">
                                <input name="email" type="email" class="form-control form-control-sm" id="colFormLabelSm" placeholder="">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mt-2 float-right">Save</button>
                        <button class="btn btn-warning submit-fn mt-2 mr-2 float-right"  type="button" onclick="history.back()">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    @endsection
