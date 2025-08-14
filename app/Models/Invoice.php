<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'invoice';
    protected $primaryKey = 'id_invoice';
    protected $fillable = [
        'id_user',
        'nisn',
        'tanggal_bayar',
        'bulan_dibayar',
        'tahun_dibayar',
        'jumlah_bayar',
        'keterangan',
        'id_pembayaran',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'nisn');
    }

    public function pembayaran()
    {
        return $this->belongsTo(Pembayaran::class, 'id_pembayaran');
    }
}
