@extends('admin/admin')

@section('main')
    <div id="siswa">
        <h2>Tambah Siswa</h2>
            {!!Form::open(['url'=>'siswa', 'files'=> true])!!}
            @include('siswa.form', ['$submitButtonText'=>'Simpan'])
            {!!Form::close()!!}
    </div>
    @stop