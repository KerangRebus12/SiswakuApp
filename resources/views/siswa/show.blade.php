@extends('admin/admin')
@section('main')
<div id="siswa">
    <h2>Detail Siswa</h2>
    <table class="table table-striped">
        <tr>
            <th class="table-primary">NISN</th>
            <td>{{ $siswa->nisn }}</td>
        </tr>
        <tr>
            <th class="table-primary">Nama Siswa</th>
            <td>{{ $siswa->nama_siswa }}</td>
        </tr>
        <tr>
            <th class="table-primary">Tanggal Lahir</th>
            <td>{{ $siswa->tanggal_lahir->format('d-m-Y') }}</td>
        </tr>
        <tr>
            <th class="table-primary">Jenis Kelamin</th>
            <td>{{ $siswa->jenis_kelamin }}</td>
        </tr>
        <tr>
            <th class="table-primary">Kelas</th>
            <td>{{$siswa->kelas->nama_kelas}}</td>
        </tr>
        <tr>
        <th class="table-primary">Nomor Telepon</th>
        <td>{{!empty($siswa->telepon->nomor_telepon)? $siswa->telepon->nomor_telepon : '-'}}</td>
        </tr>
        <tr>
        <th class="table-primary">Hobi</th>
        <td>
        @foreach($siswa->hobi as $item)
            <span>{{$item->nama_hobi}}</span>,
        @endforeach
        </td>
        </tr>
    </table>
</div>
@stop