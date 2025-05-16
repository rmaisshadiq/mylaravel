<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePenggunaRequest;
use App\Http\Requests\UpdatePenggunaRequest;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class PenggunaController extends Controller
{
    //
    public function index()
    {
        $penggunas = Pengguna::latest()->paginate(2);
        return view('penggunas.index', compact('penggunas'));
    }
    public function create()
    {
        return view('penggunas.create');
    }
    public function store(StorePenggunaRequest $request)
    {
        // $request->validate([
        //     'nama' => 'required|string|max:100',
        //     'email' => 'required|email|unique:penggunas',
        //     'password' => 'required|min:8|confirmed',
        //     'phone' => 'nullable|digits_between:10,13'
        // ]);
        // simpan ke database
        // Pengguna::create([
        //     'nama'=>$request->nama,
        //     'email'=>$request->email,
        //     'password'=> Hash::make($request->password),
        //     'phone'=>$request->phone
        // ]);
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        if ($request->hasFile('file_upload')) {
            $file = $request->file('file_upload');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('uploads',$filename,'public');
            $data['file_upload'] = $path;
        }
        Pengguna::create($data);

        return redirect()->route('penggunas.index')->with('success', 'Pengguna berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pengguna = Pengguna::findOrFail($id);
        return view('penggunas.edit', compact('pengguna'));
    }

    public function update(UpdatePenggunaRequest $request, $id) {

        $pengguna = Pengguna::findOrFail($id);
        $data = $request->validated();
        if ($request->hasFile('file_upload')) {
            // hapus file lama
            if ($pengguna->file_upload && Storage::disk('public')->exists($pengguna->file_upload)) {
                Storage::disk('public')->delete($pengguna->file_upload);
            }
            $file = $request->file('file_upload');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('uploads',$filename,'public');
            $data['file_upload'] = $path;
        }
        $pengguna->update($data);
        return redirect()->route('penggunas.index')->with('success', 'Data pengguna berhasil diupdate');
    }
}
