@extends('layouts.main')


@section('content')
    <h2>Daftar Pengguna</h2>

    <a href="{{ route('penggunas.create')}}" class="btn btn-primary">Tambah User</a>
    @if(session('success'))
        <div style="color:green;">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penggunas as $user)
                    <tr>
                        <td>{{ $user->nama }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>
                            @if ($user->file_upload)
                                <img src="{{ asset('storage/' . $user->file_upload)}}" alt="foto" width="200" height="200">
                            @else
                                <span style="color: gray">(tidak ada foto)</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('penggunas.edit', $user->id) }}" class="btn btn-sm btn-warning me-2">Edit</a>
                                <form action="{{ route('penggunas.destroy', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Yakin hapus?')"
                                        class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    {{ $penggunas->links() }}
@endsection