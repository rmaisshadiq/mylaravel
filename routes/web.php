<?php

use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dosen\DosenController;
use App\Http\Controllers\TeknisiController;

//default routing
Route::get('/', function () {
    return view('welcome');
});



Route::get('/mahasiswa', [MahasiswaController::class,'index']);

Route::get('/listmahasiswa', function() {
    $arrMhs = [
        'doom',
        'bringer',
        'doombringer',
        'rrq fahri raja dairot'
    ];
    return view('akademik.mahasiswa', ['mhs' => $arrMhs]);
});

Route::view('/hello', 'hello', ['nama' => 'doombringer']);

Route::post('submit', function () {
    return 'form submitted!!';
});


Route::put('update/{id}', function ($id) {
    return 'update data for id:' . $id;
});


Route::delete('delete/{id}', function ($id) {
    return 'delete data for id:' . $id;
});


Route::get('/profile', function () {
    echo '<h1>Profile</h1>';
    return '<p> Jurusan teknologi informasi-Politeknik Negeri Padang</p>';
});


Route::get('mahasiswa/ti/latifa', function () {
    echo "<p style='font-size:40;color:orange'>Jurusan Teknologi Informasi";
    echo "<h1> Selamat Datang Latifa...</h1>";
    echo "<hr>";
    echo "<p> lorem .........................</p>";
});


//route with parameter
Route::get('mahasiswa/{nama}', function ($nama) {
    return '<p> Nama mahasiswa RPL : <b>' . $nama . '</b></p>';
});


Route::get('hitungusia/{nama}/{tahunlahir}', function ($nama, $tahun_lahir) {
    $usia = date('Y') - $tahun_lahir;
    return "<p>Hai <b>" . $nama . "</b><br> usia anda sekarang adalah <b>" . $usia . "</b> tahun.</p>";
});


//route with optional parameter
Route::get('mahasiswa/{nama?}', function ($nama = 'tidak ada') {
    return '<p> Nama mahasiswa RPL : <b>' . $nama . '</b></p>';
});


Route::get('hitungusia/{nama?}/{tahunlahir?}', function ($nama = "tidak ada", $tahun_lahir = "2025") {
    $usia = date('Y') - $tahun_lahir;
    return "<p>Hai <b>" . $nama . "</b><br> usia anda sekarang adalah <b>" . $usia . "</b> tahun.</p>";
});


//route with regular expression
Route::get('user/{id}', function ($id) {
    return '<p> user admin memiliki id <b>' . $id . '</b></p>';
})->where('id', '[0-9]+');

//arithmetic route
Route::get('art/{num1?}/{num2?}', function ($num1 = "0", $num2 = "0") {
    $sum = $num1 + $num2;
    return '<p>' . $num1 . ' + ' . $num2 . ' = ' . $sum . '</p>';
});

//route redirect
Route::redirect('public', 'mahasiswa');


//route group
Route::prefix('login')->group(function () {
    route::get('mahasiswa', function () {
        return '<h2> login sebagai mahasiswa</h2>';
    });
    route::get('dosen', function () {
        return '<h2> login sebagai dosen</h2>';
    });
    route::get('admin', function () {
        return '<h2> login sebagai admin</h2>';
    });
});


//route fallback
Route::fallback(function () {
    return "<h2> Mohon maaf, halaman yang anda cari <b>tidak ditemukan</b>";
});

Route::get("listmahasiswa", function() {
    $mhs1 = "doom";
    $mhs2 = "bringer";
    $mhs3 = "evos";
    return view("akademik.mahasiswalist",compact("mhs1","mhs2","mhs3"));
});

Route::get("nilaimahasiswa", function() {
    $nama = "doom";
    $nim = "486501492";
    $total_nilai = "0";

    return view("akademik.nilaimahasiswa",compact(
        "nama",
        "nim",
        "total_nilai"
    ));
});

Route::get("nilaimahasiswaswitch", function() {
    $nama = "doom";
    $nim = "486501492";
    $total_nilai = "0";

    return view("akademik.nilaimahasiswaswitch",compact(
        "nama",
        "nim",
        "total_nilai"
    ));
});

Route::get("nilaimahasiswaforloop", function() {
    $nama = "doom";
    $nim = "486501492";
    $total_nilai = "0";

    return view("akademik.nilaimahasiswaforloop",compact(
        "nama",
        "nim",
        "total_nilai"
    ));
});

Route::get("nilaimahasiswawhile", function() {
    $nama = "doom";
    $nim = "486501492";
    $total_nilai = "5";

    return view("akademik.nilaimahasiswawhile",compact(
        "nama",
        "nim",
        "total_nilai"
    ));
});

Route::get("nilaimahasiswaforeach", function() {
    $nama = "doom";
    $nim = "486501492";
    $total_nilai = ["20", "30", "69"];

    return view("akademik.nilaimahasiswaforeach",compact(
        "nama",
        "nim",
        "total_nilai"
    ));
});

Route::get("nilaimahasiswaforelse", function() {
    $nama = "doom";
    $nim = "486501492";
    $total_nilai = [20, 20, 30, 50, 60, 90, 100];

    return view("akademik.nilaimahasiswaforelse",compact(
        "nama",
        "nim",
        "total_nilai"
    ));
});

Route::get("nilaimahasiswacontinue", function() {
    $nama = "doom";
    $nim = "486501492";
    $total_nilai = [20, 20, 30, 50, 60, 90, 100];

    return view("akademik.nilaimahasiswacontinue",compact(
        "nama",
        "nim",
        "total_nilai"
    ));
});

Route::get("nilaimahasiswabreak", function() {
    $nama = "doom";
    $nim = "486501492";
    $total_nilai = [100, 80, 20, 20, 30, 50, 60, 90, 100];

    return view("akademik.nilaimahasiswabreak",compact(
        "nama",
        "nim",
        "total_nilai"
    ));
});

// mahasiswa TI
Route::get('/pnp/jurusan/ti/mahasiswa', function () {
    $arrMhs = ['naufal', 'reykel', 'atika', 'dika', 'doom', 'bringer'];
    return view('akademik.mahasiswapnp', ['mhs' => $arrMhs]);
})->name('mahasiswa');

// dosen TI
Route::get('/pnp/jurusan/ti/dosen', function () {
    $arrDsn = ['dosen web framework', 'dosen microservices', 'dosen mobile programming', 'dosen multimedia', 'dosen IoT'];
    return view('akademik.dosenpnp', ['dsn' => $arrDsn]);
})->name('dosen');

// prodi
Route::get('/pnp/{jurusan}/{prodi}', function ($jurusan, $prodi) {
    $data = [$jurusan, $prodi];
    return view('akademik.prodipnp')->with('data', $data);
})->name('prodi');


Route::get('dosen', [DosenController::class, 'index']);
Route::get('teknisi/create', [TeknisiController::class, 'create']);
Route::get('teknisi', [TeknisiController::class, 'index']);
Route::get('teknisi/{id}', [TeknisiController::class, 'show']);
Route::get('teknisi/{id}/edit', [TeknisiController::class, 'edit']);
Route::put('teknisi/{id}', [TeknisiController::class, 'update']);
Route::delete('teknisi/{id}', [TeknisiController::class, 'destroy']);
Route::post('teknisi', [TeknisiController::class, 'store']);

Route::get('insert-sql', [MahasiswaController::class,'insertSql']);
Route::get('insert-prepared', [MahasiswaController::class,'insertPrepared']);
Route::get('insert-binding', [MahasiswaController::class,'insertBinding']);
Route::get('update', [MahasiswaController::class,'update']);
Route::get('delete', [MahasiswaController::class,'delete']);
Route::get('select', [MahasiswaController::class,'select']);
Route::get('select-tampil', [MahasiswaController::class,'selectTampil']);
Route::get('select-view', [MahasiswaController::class,'selectView']);
Route::get('select-where', [MahasiswaController::class,'selectWhere']);
Route::get('statement', [MahasiswaController::class,'statement']);
