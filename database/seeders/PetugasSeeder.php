<?php

namespace Database\Seeders;

use App\Models\Petugas;
use Illuminate\Database\Seeder;

class PetugasSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nama' => 'Muhammad Zahran Arrafi',
                'username' => 'zahran',
                'password' => bcrypt('zahran'),
                'telp' => '083811691729',
                'level' => 'Admin',
            ],
            [
                'nama' => 'Muhamad Rio',
                'username' => 'rio',
                'password' => bcrypt('rio'),
                'telp' => '083811658012',
                'level' => 'Petugas',
            ]
        ];
        Petugas::insert($data);
    }
}
