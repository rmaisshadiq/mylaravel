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

    public function insert_sql(){
        $query = DB::insert('insert into mahasiswas (nim, nama, jurusan, email, nohp, prodi, alamat, tgllahir, created_at, updated_at) values ("201912345", "Nabil", "Teknologi Informasi", "nabilachmad316@gmail.com", "081367995046", "RPL", "Padang", "2005-02-13", now(), now())');
        return "Data berhasil ditambahkan";
    }

    public function insert_prepared(){
        $query = DB::insert('insert into mahasiswas (nim, nama, jurusan, email, nohp, prodi, alamat, tgllahir, created_at, updated_at) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', ["2311082032", "Achmad", "Teknologi Informasi", "nabilachmad715@gmail.com", "081367995046", "RPL", "Padang", "2005-02-20", now(), now()]);
        return "Data berhasil ditambahkan";
    }

    public function insert_binding(){
        $query = DB::insert('insert into mahasiswas (nim, nama, jurusan, email, nohp, prodi, alamat, tgllahir, created_at, updated_at) values (:nim, :nama, :jurusan, :email, :nohp, :prodi, :alamat, :tgllahir, :created_at, :updated_at)',
        [
            "nim"=>"2311082031",
            "nama"=>"Achmad",
            "jurusan"=>"Teknologi Informasi",
            "email"=>"nabilachmad7@gmail.com",
            "nohp"=>"081367995046",
            "prodi"=>"RPL",
            "alamat"=>"Padang",
            "tgllahir"=>"2005-02-20",
            "created_at"=>now(),
            "updated_at"=>now()
            ]
        );
        return "Data berhasil ditambahkan";
    }

    public function update_sql(){
        $query = DB::update("UPDATE mahasiswas SET jurusan = 'sastra mesin' where nama = ?", ["Achmad"]);
        return "Data berhasil diubah";
    }

    public function delete_sql(){
        $query = DB::update("DELETE FROM mahasiswas where nama = ?", ["Nabil"]);
        return "Data berhasil dihapus";
    }

    public function select_sql(){
        $query = DB::select("SELECT * FROM mahasiswas");
        dd($query);
    }

    public function selectTampil(){
        $query = DB::select("SELECT * FROM mahasiswas");
        echo ($query[1]->id) . "<br>";
        echo ($query[1]->nim) . "<br>";
        echo ($query[1]->nama) . "<br>";
        echo ($query[1]->jurusan) . "<br>";
        echo ($query[1]->email) . "<br>";
        echo ($query[1]->nohp) . "<br>";
        echo ($query[1]->prodi) . "<br>";
        echo ($query[1]->alamat) . "<br>";
        echo ($query[1]->tgllahir) . "<br>";
        echo ($query[1]->created_at) . "<br>";
        echo ($query[1]->updated_at) . "<br>";

    }

    public function selectView(){
        $query = DB::select("SELECT * FROM mahasiswas");
        return view('akademik.mahasiswapnp', ['mhs' => $query]);
    }

    public function selectWhere(){
        $query = DB::select("SELECT * FROM mahasiswas where prodi = ? ORDER BY nim ASC", ['RPL']);
        return view('akademik.mahasiswapnp', ['mhs' => $query]);
    }

    public function statement(){
        $query = DB::delete("TRUNCATE mahasiswas");
        return "Data berhasil dihapus";
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
