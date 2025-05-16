@extends('layouts.main')


@section('content')
<h2>Edit Pengguna</h2>


@if ($errors->any())
   <div style="color:red;">
       <ul>
       @foreach ($errors->all() as $error)
           <li>{{ $error }}</li>
       @endforeach
       </ul>
   </div>
@endif


<form action="{{ route('penggunas.update', $pengguna->id) }}" method="POST" enctype="multipart/form-data">
   @csrf
   @method('PUT')


   <label>Nama:</label>
   <input type="text" name="nama" value="{{ old('nama', $pengguna->nama) }}"><br>


   <label>Email:</label>
   <input type="email" name="email" value="{{ old('email', $pengguna->email) }}" readonly class="bg-body-secondary"><br>


   <label>Telepon:</label>
   <input type="text" name="phone" value="{{ old('phone', $pengguna->phone) }}"><br>


    @if ($pengguna->file_upload)
        <div>
            <img src="{{ asset('storage/' . $pengguna->file_upload )}}" 
            alt="foto" width='200' height="200">
        </div>
    @endif

   <label>Upload File (PDF/JPG/PNG)</label>
   <input type="file" name="file_upload" accept=".pdf,.jpg,.jpeg,.png">
   @error('file_upload')
   <br><small style="color: red">{{ $message }}</small>
   @enderror

   <button type="submit">Update</button>
</form>
@endsection
