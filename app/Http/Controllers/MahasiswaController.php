<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function insertSql(){
        $query = DB::insert('insert into mahasiswas (nim, nama, jurusan, email, nohp, prodi, alamat, tgllahir, created_at, updated_at) values ("201912345", "Nabil", "Teknologi Informasi", "nabilachmad316@gmail.com", "081367995046", "RPL", "Padang", "2005-02-13", now(), now())');
        return "Data berhasil ditambahkan";
    }

    public function index()
    {
        //
        DB::listen( function ($query) {
            logger("Query: " . $query->sql." |binding " .implode(", ", $query->bindings));
        });

        //mengambil  semua data mahasiswa
        $data = Mahasiswa::all();
        // dd($data);

        dump($data);
        return view('mahasiswa.index', compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
