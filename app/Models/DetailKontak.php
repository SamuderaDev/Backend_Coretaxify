<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailKontak extends Model
{
    protected $guarded = ['id'];

    // protected $fillable = [

    //     'jenis_kontak',
    //     'nomor_telepon',
    //     'nomor_handphone',
    //     'nomor_faksimile',
    //     'alamat_email',
    //     'alamat_situs_wajib',
    //     'keterangan',
    //     'tanggal_mulai',
    //     'tanggal_berakhir',
    // ];

    public function profil_saya()
    {
        return $this->hasOne(ProfilSaya::class);
    }
}
