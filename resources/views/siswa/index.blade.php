@extends('admin/admin')

@section('main')
    <div id="siswa">
        <h2>Siswa</h2>
        @if (!empty($siswa_list))
            <table class="table">
                <thead>
                    <tr>
                        <th>NISN</th>
                        <th>Nama</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Kelas</th>
                        <th>Telepon</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($siswa_list as $siswa)
                    <tr>
                        <td>{{$siswa->nisn}}</td>
                        <td>{{$siswa->nama_siswa}}</td>
                        <td>{{$siswa->tanggal_lahir->format('d-m-Y')}}</td>
                        <td>{{$siswa->jenis_kelamin}}</td>
                        <td>{{$siswa->kelas->nama_kelas}}</td>
                        <td>{{!empty($siswa->telepon->nomor_telepon)? $siswa->telepon->nomor_telepon : '-'}}</td>
                        <td>
                        <div class="btn-group" role="group">
                        <a href="siswa/{{$siswa->id}}" class="btn btn-success btn-sm btn-icon icon-left">Detail</a>
                        </div>
                        <div class="btn-group" role="group">
                            <a href="siswa/{{$siswa->id}}/edit" class="btn btn-warning btn-sm btn-icon icon-left">Edit</a>
                        </div>
                        <div class="btn-group" role="group">
                            {!!Form::model($siswa, ['method'=>'DELETE', 'action'=>['SiswaController@destroy', $siswa->id]])!!}
                            {!!Form::submit('Delete', ['class'=>'btn btn-danger btn-sm'])!!}
                            {!!Form::close()!!}
                        </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @else
            <p>Data Tidak Ditemukan</p>
            @endif
            <div class="table-bottom">
                <div>
                    <strong>Jumlah Siswa : {{$jumlah_siswa}}</strong>
                </div>
                <div class="paging">
                    {{$siswa_list->links()}}
                </div>
            </div>
            <div class="bottom-nav">
                <div>
                    <a href="siswa/create" class="btn btn-primary">Tambah Siswa</a>
                </div>
            </div>
    </div>
@endsection