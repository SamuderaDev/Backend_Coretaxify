<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class WakilSaya extends Model
{
    protected $guarded = ['id'];

    protected $fillable = [
        'nama',
        'npwp',
        'jenis_perwakilan',
        'id_penunjukkan_perwakilan',
        'nomor_dokumen_penunjukkan_perwakilan',
        'izin_perwakilan',
        'status_penujukkan',
        'tanggal_disetujui',
        'tanggal_ditolak',
        'tanggal_dicabut',
        'tanggal_dibatalkan',
        'alasan',
        'tanggal_mulai',
        'tanggal_berakhir',
    ];  

    public function informasi_umums(): BelongsToMany {
        return $this->belongsToMany(InformasiUmum::class, 'wakil_saya_informasi_umums');
    }
}