@extends('layouts.main')
@section('title')
Daftar Mahasiswa
@endsection
@section('content')
    <h1>Daftar Mahasiswa Jurusan TI</h1>
    <ol>
        @foreach ($mhs as $namaMhs)
            <li>{{ $namaMhs }}</li>
        @endforeach
    </ol>

@endsection