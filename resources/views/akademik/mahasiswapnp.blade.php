Update File mahasiswapnp.blade.php

@extends('layouts.main')
@section('title')
    Daftar Mahasiswa
@endsection
@section('content')
    <h1>Daftar Mahasiswa jurusan ti</h1>
    <table>
        <thead>
            <tr>
                <th></th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Jurusan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mhs as $mahasiswa)
                <tr>
                    <td>{{ $mahasiswa->id}}</td>
                    <td>{{ $mahasiswa->nama  }} </td>
                    <td>{{ $mahasiswa->nim  }} </td>
                    <td>{{ $mahasiswa->prodi  }} </td>

                </tr>
            @endforeach
    </table>
@endsection