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

    public function insertSql() {
        $query = DB::insert('INSERT INTO mahasiswas (nim, nama, jurusan, prodi, email, nohp, alamat, created_at,
        updated_at) VALUES ("24343392", "saveg", "teknologi informasi", "TRPL", "sevegcog@gmail.com", "0812358393",
        "jl. limau manis", now(), now())');

        return "Berhasil insert data mahasiswa";
    }

    public function insertBinding() {
        $query = DB::insert('INSERT INTO mahasiswas (nim, nama, jurusan, prodi, email, nohp, alamat, created_at,
                updated_at) VALUES (:nim,:nama,:jurusan,:prodi,:email,:nohp,:alamat,:created_at,:updated_at)', 
                [
                    "nim" => "5014082031",
                    "nama" => "dudu jr",
                    "jurusan" => "teknologi informasi",
                    "prodi" => "teknologi rekayasa AI konvensional",
                    "email" => "dudujr@gmail.com",
                    "nohp" => "08125358393",
                    "alamat" => "belakang sph", 
                    "created_at" => now(), 
                    "updated_at" => now()
                ]
            );
        
        return "Berhasil insert data mahasiswa";
    }
    
    public function insertPrepared() {
        $query = DB::insert('INSERT INTO mahasiswas (nim, nama, jurusan, prodi, email, nohp, alamat, created_at,
                updated_at) VALUES (?,?,?,?,?,?,?,?,?)', ["243433921", "omak", "teknologi informasi", "TRPL", "omakco@gmail.com", "08125358393",
                "jl. limau manies", now(), now()]);

        return "Berhasil insert data mahasiswa";
    }

    public function update() {
        $query = DB::update('UPDATE mahasiswas SET
            jurusan = "ilmu jungler" WHERE nama=?', ['saveg']);
        
        return "Berhasil update data mahasiswa";
    }

    public function delete() {
        $query = DB::delete('DELETE FROM mahasiswas WHERE nama=?', ['omak']);
        
        return "Berhasil delete data mahasiswa";
    }

    public function select() {
        $query = DB::select("SELECT * FROM mahasiswas");
        dd($query);
    }
    
    public function selectTampil() {
        $query = DB::select("SELECT * FROM mahasiswas");
        echo "ID: " . ($query[1]->id) . "<br/>";
        echo "Nama: " . ($query[1]->nama) . "<br/>";
        echo "NIM: " . ($query[1]->nim) . "<br/>";
        echo "Email: " . ($query[1]->email) . "<br/>";
        echo "No HP: " . ($query[1]->nohp) . "<br/>";
        echo "Jurusan: " . ($query[1]->jurusan) . "<br/>";
        echo "Program Studi: " . ($query[1]->prodi) . "<br/>";
        echo "Alamat: " . ($query[1]->alamat) . "<br/>";
    }

    public function selectView() {
        $query = DB::select("SELECT * FROM mahasiswas");
        return view("akademik.mahasiswapnp", ["mhs"=>$query]);
    }

    public function selectWhere() {
        $query = DB::select("SELECT * FROM mahasiswas WHERE prodi=? ORDER BY nim ASC", ["TRPL"]);
        return view("akademik.mahasiswapnp", ["mhs"=>$query]);
    }

    public function statement() {
        $query = DB::delete("TRUNCATE mahasiswas");
        return "berhasil menghapus table mahasiswas";
    }

    public function index()
    {
        //
        DB::listen( function ($query) {
            logger("Query: " . $query->sql. " |binding ".implode(", ", $query->bindings));

            
        });

        $data = Mahasiswa::all();
            // dd($data);

        dump($data);
        return view("mahasiswa.index", compact("data"));
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
