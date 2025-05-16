<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // jika ingin seeder manual tanpa faker
        // \App\Models\Mahasiswa::create([
        //     'nama'=>'gue',
        //     'nim'=>'123',
        //     'email'=>'gue@gmail.com',
        //     'jurusan'=>'TI',
        //     'prodi'=>'TRPL',
        //     'alamat'=>'disini',
        //     'tgllahir'=>'2025-4-14'
        // ]);

        // jika menggunakan faker
        \App\Models\Mahasiswa::factory(30)->create();
    }
}
