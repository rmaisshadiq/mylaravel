<?php

namespace App\Http\Controllers\dosen;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Dosen;


class DosenController extends Controller
{
    //
    public function index(){
        return 'Menampilkan list dosen';
    }
    
    public function cekObjek(){
        $dosen = new Dosen();
        dd($dosen);
    }

    public function insert() {
        $dosen = new Dosen();
        $dosen->nama="doom";
        $dosen->nik="12381823812";
        $dosen->email="doombringer@gmail.com";
        $dosen->nohp="486501492";
        $dosen->alamat="land of dawn";
        $dosen->keahlian="curi lord lawan";
        $dosen->save();
        dd($dosen);
    }

    public function massAssignment() {
        $dosen = Dosen::create (
            [
                'nama'=>'Rafi',
                'nik'=>'529349129',
                'email'=>'rmaisshadiq@yahoo.com',
                'nohp'=>'08123123892',
                'alamat'=>'padang panjang',
                'keahlian'=>'ngoding sambil scroll fesnuk'
            ]
            );
            dd($dosen);
    }

    public function update() {
        $dosen = Dosen::find(3);
        $dosen->keahlian="pegang retribution";
        $dosen->save();
        dd($dosen);
    }

    public function updateWhere() {
        $dosen = Dosen::where('nik', '12381823812')->first();
        $dosen->keahlian="yss first pick";
        $dosen->save();
        dd($dosen);
    }
    
    public function massUpdate() {
        $dosen = Dosen::where('nik', '12381823812')->first()->update(
            [
                'alamat' => 'korea selatan',
                'keahlian' => 'menit 8 lvl 15'
            ]
        );
        dd($dosen);
    }
    public function delete()
    {
        $dosen = Dosen::find(5);
        $dosen->delete();
        dd($dosen);
    }
    public function destroy()
    {
        $dosen = Dosen::destroy(8);
        dd($dosen);
    }
 
 
    public function massDelete()
    {
        $dosen = Dosen::where('keahlian', 'Data Analyst')->delete();
        dd($dosen);
    }
    public function all()
    {
        $dosen = Dosen::all();
        foreach ($dosen as $itemDosen) {
            echo $itemDosen->id . '<br>';
            echo $itemDosen->nama . '<br>';
            echo $itemDosen->nik . '<br>';
            echo $itemDosen->email . '<br>';
            echo $itemDosen->nohp . '<br>';
            echo $itemDosen->alamat;
            echo '<hr>';
            //dd ($itemDosen);
        }
    }
    public function allView()
    {
        $dosen = Dosen::all();
        return view('akademik.dosen', ['dsn' => $dosen]);
    }
 
 
    public function getWhere()
    {
 
 
        $dosen = Dosen::where('keahlian', 'Web Programming')
            ->orderBy('nama', 'asc')
            ->get();
        return view('akademik.dosen', ['dsn' => $dosen]);
    }
    public function testWhere()
    {
 
 
        $dosen = Dosen::where('keahlian', 'Web Programming')
            ->orderBy('nik', 'asc')
            ->get();
        return view('akademik.dosen', ['dsn' => $dosen]);
    }
    public function first()
    {
 
 
        $dosen = Dosen::where('keahlian', 'Web Programming')->first();
        return view('akademik.dosen1', ['dsn' => $dosen]);
    }
    public function find()
    {
 
 
        $dosen = Dosen::find(15);
        return view('akademik.dosen1', ['dsn' => $dosen]);
    }
    public function latest()
    {
 
 
        $dosen = Dosen::latest()->get();
        return view('akademik.dosen', ['dsn' => $dosen]);
    }
    public function limit()
    {
 
 
        $dosen = Dosen::latest()->limit(2)->get();
        return view('akademik.dosen', ['dsn' => $dosen]);
    }
    public function skipTake()
    {
 
 
        $dosen = Dosen::orderBy("id")->skip(1)->take(4)->get();
        return view('akademik.dosen', ['dsn' => $dosen]);
    }

    public function softDelete() {
        Dosen::where('id','1')->delete();
        return 'Data berhasil dihapus';
    }

    public function withTrashed() {
        $dosen = Dosen::withTrashed()->get();
        return view('akademik.dosen', ['dsn' => $dosen]);
    }

    public function restore() {
        Dosen::withTrashed()->where('id','1')->restore();
        return 'dara berhasil direstore';
    }

    public function forceDelete() {
        Dosen::where('id', '1')->forceDelete();
        return "data berhasil di hapus secara permanen";
    }
}
