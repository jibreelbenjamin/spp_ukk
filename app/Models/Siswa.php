<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';
    protected $primaryKey = 'nisn';
    public $incrementing = false;
    protected $keyType = 'int';
    protected $fillable = [
        'nisn',
        'nis',
        'nama_siswa',
        'id_kelas',
        'alamat',
        'no_telp',
        'id_spp',
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id_kelas');
    }

    public function spp()
    {
        return $this->belongsTo(Spp::class, 'id_spp', 'id_spp');
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class, 'nisn', 'nisn');
    }
}
