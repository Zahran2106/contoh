<?php

namespace Database\Seeders;

use App\Models\Petugas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'nama' => 'Mohamad Asep Saepulloh',
            'username' => 'asep30',
            'password' => bcrypt('asep30'),
            'telp' => '083811691729',
            'level' => 'Admin',
        ];
        Petugas::insert($data);
    }
}
