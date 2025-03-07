<?php


use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;
//default routing
Route::get('/', function () {
    return view('welcome');
});

Route::get('/mahasiswa', [MahasiswaController::class, 'index']);


Route::get('/listmahasiswa', function(){
    $arrmhs=[
        'Nabil',
        'Achmad',
        'Khoir',
        'Hanifa'
    ];
    return view('akademik.mahasiswa', ['mhs' => $arrmhs]);
});


Route::view('/hello', 'hello', ['nama'=>'Nabil Achmad Khoir']);


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
    echo "<h1> Selamat Datang Nabil...</h1>";
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

route::get("mahasiswalist", function(){
    $mhs1 = "Abdhu";
    $mhs2 = "Wayaw";
    $mhs3 = "Cibaduyut";

    return view('akademik.mahasiswalist', compact('mhs1', 'mhs2', 'mhs3'));
});

// if conditional
route::get("nilaimahasiswa", function(){
    $nama = "Nabil";
    $nim = "2311082032";
    $total_nilai = 90;

    return view('akademik.nilaimahasiswa', compact('nama', 'nim', 'total_nilai'));
});

// switch conditional
route::get("nilaimahasiswaswitch", function(){
    $nama = "Nabil";
    $nim = "2311082032";
    $total_nilai = 100;

    return view('akademik.nilaimahasiswaswitch', compact('nama', 'nim', 'total_nilai'));
});

// forloop
route::get("nilaimahasiswafor", function(){
    $nama = "Nabil";
    $nim = "2311082032";
    $total_nilai = 10;

    return view('akademik.nilaimahasiswaforloop', compact('nama', 'nim', 'total_nilai'));
});