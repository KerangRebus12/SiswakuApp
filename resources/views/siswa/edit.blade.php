@extends('admin/admin')
@section('main')
<div id="siswa">
    <h2>Edit Data Siswa</h2>
    {!!Form::model($siswa, ['method'=>'PATCH','action'=>['SiswaController@update', $siswa->id]])!!}
    @include('siswa.form', ['submitButtonText'=>'Update'])
    {!!Form::close()!!}
</div>
@stop