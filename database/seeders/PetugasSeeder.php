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
                'nama' => 'Mohamad Asep Saepulloh',
                'username' => 'asep30',
                'password' => bcrypt('asep30'),
                'telp' => '083811691729',
                'level' => 'Admin',
            ],
            [
                'nama' => 'Muhamad Ramdhani Akbar',
                'username' => 'akbar',
                'password' => bcrypt('akbar'),
                'telp' => '083811658012',
                'level' => 'Petugas',
            ]
        ];
        Petugas::insert($data);
    }
}
