@extends('layouts.main')
@section('title')
    Daftar Dosen
@endsection
@section('content')
    <h1>Daftar Dosen Jurusan Teknologi Informasi</h1>
    <ol>
        @forelse ($dsn as $namadosen)
            <li>{{ $namadosen }}</li>
            @empty
            <div class="alert alert-warning d-inline-block">
                Data Dosen tidak ada. Silahkan input data terlebih dahulu.
            </div>
        @endforelse
    </ol>
@endsection