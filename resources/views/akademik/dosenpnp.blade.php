@extends('layouts.main')
@section('title')
    Daftar Dosen
@endsection
@section('content')
    <h1>Daftar Dosen Jurusan Teknologi Informasi</h1>
    <ol>
        @foreach ($dsn as $namaDsn)
            <li>{{ $namaDsn }}</li>
        @endforeach
    </ol>
@endsection