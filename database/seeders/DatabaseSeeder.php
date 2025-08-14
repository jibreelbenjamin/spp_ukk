<?php

namespace Database\Seeders;

use App\Models\Kelas;
use App\Models\Spp;
use App\Models\Pembayaran;
use App\Models\Siswa;
use App\Models\Invoice;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        User::factory()->create([
            'username' => 'admin',
            'name' => 'Jibreel Benjamin',
            'password' => 'admin123',
        ]);

    $kelas = Kelas::factory(3)->create();

    $spp = Spp::factory(2)->create();
    $pembayaran = Pembayaran::factory(2)->create();

    // Buat siswa di kelas 1 semua
    Siswa::factory(10)
        ->recycle($kelas->where('id_kelas')) // hanya ambil kelas id 1
        ->recycle($spp) // ambil spp secara acak dari yg sudah dibuat
        ->create();
        Invoice::factory(20)->create();
    }
}
