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
        User::factory()->create([
            'username' => 'admin',
            'name' => 'Jibreel Benjamin',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
        ]);

        // Buat 8 petugas
        $petugas = User::factory(8)->create([
            'role' => 'petugas',
        ]);

        // Buat 3 kelas
        $kelas = Kelas::factory(3)->create();

        // Buat 2 spp
        $spp = Spp::factory(2)->create();

        // Buat 4 pembayaran
        $pembayaran = Pembayaran::factory(4)->create();

        // Buat 90 siswa (dibagi rata ke kelas)
        $siswa = collect();
        foreach ($kelas as $k) {
            $siswa = $siswa->merge(
                Siswa::factory(30)->create([
                    'id_kelas' => $k->id_kelas,
                    'id_spp' => $spp->random()->id_spp,
                ])
            );
        }

        // Sekarang bikin invoice sesuai aturan
        $allInvoices = collect();

        // 1 siswa sekitar 15 faktur
        foreach ($siswa as $s) {
            $siswaInvoices = Invoice::factory(15)->make([
                'nisn' => $s->nisn,
                'id_user' => $petugas->random()->id_user,
                'id_spp' => $spp->random()->id_spp,
                'id_pembayaran' => $pembayaran->random()->id_pembayaran,
            ]);
            Invoice::insert($siswaInvoices->toArray());
            $allInvoices = $allInvoices->merge($siswaInvoices);
        }

        // Validasi pembagian agar sesuai ketentuan
        // 1 petugas ≈ 10 invoice
        foreach ($petugas as $p) {
            $invoices = Invoice::where('id_user', $p->id_user)->count();
            if ($invoices < 10) {
                $extra = Invoice::factory(10 - $invoices)->make([
                    'id_user' => $p->id_user,
                    'nisn' => $siswa->random()->nisn,
                    'id_spp' => $spp->random()->id_spp,
                    'id_pembayaran' => $pembayaran->random()->id_pembayaran,
                ]);
                Invoice::insert($extra->toArray());
            }
        }

        // 1 pembayaran ≈ 40 invoice
        foreach ($pembayaran as $pay) {
            $count = Invoice::where('id_pembayaran', $pay->id_pembayaran)->count();
            if ($count < 40) {
                $extra = Invoice::factory(40 - $count)->make([
                    'id_pembayaran' => $pay->id_pembayaran,
                    'nisn' => $siswa->random()->nisn,
                    'id_user' => $petugas->random()->id_user,
                    'id_spp' => $spp->random()->id_spp,
                ]);
                Invoice::insert($extra->toArray());
            }
        }

        // 1 spp ≈ 60 invoice
        foreach ($spp as $sppData) {
            $count = Invoice::where('id_spp', $sppData->id_spp)->count();
            if ($count < 60) {
                $extra = Invoice::factory(60 - $count)->make([
                    'id_spp' => $sppData->id_spp,
                    'nisn' => $siswa->random()->nisn,
                    'id_user' => $petugas->random()->id_user,
                    'id_pembayaran' => $pembayaran->random()->id_pembayaran,
                ]);
                Invoice::insert($extra->toArray());
            }
        }
    }
}
