<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF Report Data Beasiswa</title>
  {{--  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">--}}
    <style>
        .borderless td {
            border: none;
            height: 5px;
        }
    </style>
</head>
<body>
<div align="center">
    {{--<tr>--}}
    {{--<td>--}}
    <center>
        {{--<img class="fa-image" height="45" width="45" src="{{asset('admin/assets/img/logo1.jpg')}}" alt="avatar">--}}
        <font size="4">FORMULIR PENGAJUAN BEASISWA</font><BR>
        <font size="5"><b>POLITEKNIK HARAPAN BERSAMA TEGAL</b></font><BR>
        <font size="2"> Jl. Dewi Sartika No.71, Pesurungan Kidul, Kec. Tegal Bar., Kota Tegal, Jawa Tengah 52117</font><BR>
        <font size="2"><i>Website : www.poltektegal.ac.id, Instagram : @phptegal</i><BR></font>
    </center>
    {{--</td>--}}
    {{--</tr>--}}
    {{--<tr>--}}
    {{--<td colspan="2">--}}
    <hr style="height:1px;border:none;color:#333;background-color:#333;">
    {{--</td>--}}
    {{--</tr>--}}
</div>
<h5>Yang bertanda tangan dibawah ini :</h5>
<table class="table table-sm borderless">
    <thead>
    <tbody>

    <tr>
        <td width="3%">1.</td>
        <td width="35%">No. Urut Usulan</td>
        <td width="60%">: </td>
    </tr>
    <tr>
        <td width="3%">2.</td>
        <td width="35%">Nama Perguruan Tinggi</td>
        <td width="60%">: Politeknik Harapan Bersama</td>
    </tr>
    <tr>
        <td width="3%">3.</td>
        <td width="35%">Program Studi</td>
        <td width="60%">: {{$beasiswa->mahasiswa->prodi->program_study}}</td>
    </tr>
    <tr>
        <td width="3%">4.</td>
        <td width="35%"> Nama </td>
        <td width="60%">: {{$beasiswa->mahasiswa->nama}}</td>
    </tr>
    <tr>
        <td width="3%">5.</td>
        <td width="35%">Jenis Kelamin</td>
        <td width="60%">: {{$beasiswa->jenis_kelamin}}</td>
    </tr>
    <tr>
        <td width="3%">6.</td>
        <td width="35%">NPM</td>
        <td width="60%">: {{$beasiswa->mahasiswa->nim}}</td>
    </tr>
    <tr>
        <td width="3%">7.</td>
        <td width="35%">Angkatan</td>
        <td width="60%">: {{$beasiswa->mahasiswa->angkatan}}</td>
    </tr>
    <tr>
        <td width="3%">8.</td>
        <td width="35%">Semester</td>
        <td width="60%">: {{$beasiswa->semester}}</td>
    </tr>
    <tr>
        <td width="3%">9.</td>
        <td width="35%">IP Komulatif</td>
        <td width="60%">: {{$beasiswa->ipk}}</td>
    </tr>
    <tr>
        <td width="3%">10.</td>
        <td width="35%">Pekerjaan Orang tua/wali</td>
        <td width="60%">: {{$beasiswa->pekerjaan_ortu}}</td>
    </tr>
    <tr>
        <td width="3%">11.</td>
        <td width="35%">Tanggungan</td>
        <td width="60%">: {{$beasiswa->tanggungan_ortu}}</td>
    </tr>
    <tr>
        <td width="3%">12.</td>
        <td width="35%">Penghasilan Orang tua/wali</td>
        <td width="60%">: {{$beasiswa->penghasilan_ortu}}</td>
    </tr>
    <tr>
        <td width="3%">13.</td>
        <td width="35%">Alamat Tempat Tinggal</td>
        <td width="60%">: {{$beasiswa->alamat}}</td>
    </tr>

    <tr>
        <td width="3%">14.</td>
        <td width="35%">No. Hp Mahasiswa</td>
        <td width="60%">: {{$beasiswa->mahasiswa->no_hp}}</td>
    </tr>
    <tr>
        <td width="3%">15.</td>
        <td width="35%">No. Hp Orang Tua/wali</td>
        <td width="60%">: {{$beasiswa->no_hp_ortu}}</td>
    </tr>
    <tr>
        <td width="3%">16.</td>
        <td width="35%">Nama Lengkat Bank</td>
        <td width="60%">: {{$beasiswa->nama_bank}}</td>
    </tr>
    <tr>
        <td width="3%">17.</td>
        <td width="35%">Cabang Bank</td>
        <td width="60%">: {{$beasiswa->cabang_bank}}</td>
    </tr>
    <tr>
        <td width="3%">18.</td>
        <td width="35%">No. Rekening Bank</td>
        <td width="60%">: {{$beasiswa->no_rek}}</td>
    </tr>
    <tr>
        <td width="3%">19.</td>
        <td width="35%">Nama Pemegang Rekening</td>
        <td width="60%">: {{$beasiswa->nama_rek}}</td>
    </tr>
    </tbody>
</table>
<ul class="">
    <li>Mohon Dengan Hormat Untuk Mendapatkan {{$beasiswa->kategori}}.</li>
    <li>Saya Bertanggung jawab Atas Kebenaran Data Tersebut Diatas.</li>
    <li>Saya Berjanji Akan Mematuhi Segala Peraturan/Ketentuan Yang Ditetapkan Dari Perguruan Tinggi.</li>
</ul>
<br><br>
<table align=left border="0" cellpadding="1" style="width: 250px;">
    <tbody>
    <tr>
        <td valign="top">

            <div align="left">
                <span ></span>
                <br>
                <br>
                <span >Mengetahui/Menyetujui Direktur Politeknik Harapan Bersama</span>
            </div>

            <div align="left" style="margin: 50px "></div>
            <div align="left"><br><br>
                <span>(................................................)</span></div>
        </td>
    </tr>
    </tbody>
</table>
<table align=right border="0" cellpadding="1" style="width: 250px;">
    <tbody>
    <tr>
        <td valign="top">

            <div align="left">
                <span >Tegal, Agustus 2020 </span>
                <br>
                <br>
                <br>
                <span >Pemohon</span>
            </div>

            <div align="left" style="margin: 50px "></div>
            <div align="left"><br><br>
                <span>({{$beasiswa->mahasiswa->nama}})</span></div>
        </td>
    </tr>
    </tbody>
</table>
<br><br><br><br><br><br><br><br><br><br>
<ul class="">
    <a style="font-size: 12px;">Perhatian :</a>
    <li style="font-size: 12px;">Stemple PTS harap dikenakan diatas sebagian pas foto pemohon</li>
</ul>
</body>
</html>
