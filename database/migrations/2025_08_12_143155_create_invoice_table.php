<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        
        Schema::create('kelas', function (Blueprint $table) {
            $table->id('id_kelas');
            $table->string('nama_kelas');
            $table->string('jurusan');
            $table->timestamps();
        });
        Schema::create('spp', function (Blueprint $table) {
            $table->id('id_spp');
            $table->string('tahun');
            $table->integer('nominal');
            $table->timestamps();
        });
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id('id_pembayaran');
            $table->string('nama_pembayaran');
            $table->timestamps();
        });
        Schema::create('siswa', function (Blueprint $table) {
            $table->id('nisn');
            $table->string('nis')->unique();
            $table->string('nama_siswa');
            $table->foreignId('id_kelas')->constrained('kelas', 'id_kelas')->onDelete('cascade');
            $table->string('alamat');
            $table->string('no_telp')->nullable();
            $table->foreignId('id_spp')->constrained('spp', 'id_spp')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('invoice', function (Blueprint $table) {
            $table->id('id_invoice');
            $table->foreignId('id_user')->constrained('users', 'id_user')->onDelete('cascade');

            $table->unsignedBigInteger('nisn'); // biar nisn bisa diupdate
            $table->foreign('nisn')
                ->references('nisn')
                ->on('siswa')
                ->onDelete('cascade')
                ->onUpdate('cascade'); // kunci


            $table->string('tanggal_bayar')->nullable();
            $table->string('bulan_dibayar');
            $table->string('tahun_dibayar');
            $table->foreignId('id_spp')->constrained('spp', 'id_spp')->onDelete('cascade');
            $table->integer('jumlah_bayar');
            $table->string('keterangan')->nullable();
            $table->foreignId('id_pembayaran')->constrained('pembayaran', 'id_pembayaran')->onDelete('cascade');
            $table->enum('status', ['lunas', 'pending', 'gagal'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas');
        Schema::dropIfExists('spp');
        Schema::dropIfExists('pembayaran');
        Schema::dropIfExists('siswa');
        Schema::dropIfExists('invoice');

    }
};
