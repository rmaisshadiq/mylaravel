<?php


use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dosen\DosenController;
use App\Http\Controllers\dosen\DosenpnpController;
use App\Http\Controllers\MahasiswapnpController;
use App\Http\Controllers\TeknisiController;

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
route::get("nilaimahasiswaforloop", function(){
    $nama = "Nabil";
    $nim = "2311082032";
    $total_nilai = 10;

    return view('akademik.nilaimahasiswaforloop', compact('nama', 'nim', 'total_nilai'));
});

// while loop
route::get("nilaimahasiswawhile", function(){
    $nama = "Nabil";
    $nim = "2311082032";
    $total_nilai = 2;

    return view('akademik.nilaimahasiswawhileloop', compact('nama', 'nim', 'total_nilai'));
});

// foreach loop
route::get("nilaimahasiswafore", function(){
    $nama = "Nabil";
    $nim = "2311082032";
    $total_nilai = [20, 30, 40, 50];

    return view('akademik.nilaimahasiswaforeach', compact('nama', 'nim', 'total_nilai'));
});

// forelse loop
route::get("nilaimahasiswaforel", function(){
    $nama = "Nabil";
    $nim = "2311082032";
    $total_nilai = [50, 70, 80, 100];

    return view('akademik.nilaimahasiswaforelse', compact('nama', 'nim', 'total_nilai'));
});

//continue
Route::get("nilaimahasiswacon", function(){
    $nama = "Nabil";
    $nim = "2311082032";
    $total_nilai = [20,30,50,80];
    

    return view("akademik.nilaimahasiswacontinue", compact ("nama","nim","total_nilai"));

});
//break
Route::get("nilaimahasiswabreak", function(){
    $nama = "Nabil";
    $nim = "2311082032";
    $total_nilai = [100,80,20,30,50,80];
    

    return view("akademik.nilaimahasiswabreak", compact ("nama","nim","total_nilai"));

});

// Mahasiswa
Route::get('/pnp/jurusan/ti/mahasiswa', function () {
    $arrmhs = ['Nabil', 'Abdhu', 'Rafi', 'DanTDM'];
    return view('akademik.mahasiswapnp', ['mhs' => $arrmhs]);
})->name('mahasiswa');

// Dosen
Route::get('/pnp/jurusan/ti/dosen', function () {
    $arrdsn = ['Dosen framework', 'Dosen mobile Programming', 'dosen IOT', 'dosen web programming'];
    return view('akademik.dosenpnp', ['dsn' => $arrdsn]);
})->name('dosen');

// prodi
Route::get('/pnp/{jurusan}/{prodi}', function ($jurusan,$prodi) {
    $data = [$jurusan,$prodi];
    return view('akademik.prodipnp')->with('data',$data);
})-> name('prodi');

Route::get('teknisi', [TeknisiController::class, 'index']);
Route::get('teknisi/create', [TeknisiController::class, 'create']);
Route::post('teknisi', [TeknisiController::class, 'store']);
Route::get('teknisi/{id}', [TeknisiController::class, 'show']);
Route::get('teknisi/{id}/edit', [TeknisiController::class, 'edit']);
Route::put('teknisi/{id}', [TeknisiController::class, 'update']);
Route::delete('teknisi/{id}', [TeknisiController::class, 'destroy']);

Route::get('insert-sql', [MahasiswaController::class, 'insert_sql']);
Route::get('insert-prepared', [MahasiswaController::class, 'insert_prepared']);
Route::get('insert-binding', [MahasiswaController::class, 'insert_binding']);
Route::get('update', [MahasiswaController::class, 'update_sql']);
Route::get('delete', [MahasiswaController::class, 'delete_sql']);
Route::get('select', [MahasiswaController::class, 'select_sql']);
Route::get('select-tampil', [MahasiswaController::class, 'selectTampil']);
Route::get('select-view', [MahasiswaController::class, 'selectView']);
Route::get('select-where', [MahasiswaController::class, 'selectWhere']);
Route::get('statement', [MahasiswaController::class, 'statement']);

Route::get('dosen', [DosenpnpController::class,'index'])->name('dosens.index');
Route::get('dosen/create', [DosenpnpController::class,'create'])->name('dosens.create');
Route::post('dosen', [DosenpnpController::class,'store'])->name('dosens.store');
Route::get('dosen/{id}/edit', [DosenpnpController::class,'edit'])->name('dosens.edit');
Route::put('dosen/{id}', [DosenpnpController::class,'update'])->name('dosens.update');
Route::delete('dosen/{id}', [DosenpnpController::class,'destroy'])->name('dosens.destroy');

Route::get('mahasiswa', [MahasiswapnpController::class,'index'])->name('mahasiswa.index');
Route::get('mahasiswa/create', [MahasiswapnpController::class,'create'])->name('mahasiswa.create');
Route::post('mahasiswa', [MahasiswapnpController::class,'store'])->name('mahasiswa.store');
Route::get('mahasiswa/{id}/edit', [MahasiswapnpController::class,'edit'])->name('mahasiswa.edit');
Route::put('mahasiswa/{id}', [MahasiswapnpController::class,'update'])->name('mahasiswa.update');
Route::delete('mahasiswa/{id}', [MahasiswapnpController::class,'destroy'])->name('mahasiswa.destroy');