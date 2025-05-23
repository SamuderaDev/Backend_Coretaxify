<?php

 namespace App\Http\Resources;

 use Barryvdh\Reflection\DocBlock\Type\Collection;
 use Illuminate\Http\Resources\Json\JsonResource;

 class ProfilSayaResource extends JsonResource {
     public function toArray($request): array {
         return [
             'id' => $this->id,
             'informasi_umum' => new InformasiUmumResource($this->informasi_umum),
             'data_ekonomi' => new DataEkonomiResource($this->data_ekonomi),
             'nomor_identifikasi_eksternal' => new NomorIdentifikasiEksternalResource($this->nomor_identifikasi_eksternal),
             'pihak_terkait' => PihakTerkaitResource::collection($this->pihak_terkaits),
             'detail_bank' => DetailBankResource::collection($this->detail_banks),
             'detail_kontak' => DetailKontakResource::collection($this->detail_kontaks),
             'tempat_kegiatan_usaha' => TempatKegiatanUsahaResource::collection($this->tempat_kegiatan_usahas),
             'unit_pajak_keluarga' => UnitPajakKeluargaResource::collection($this->unit_pajak_keluargas),
             'created_at' => $this->created_at->toDateTimeString(),
             'updated_at' => $this->updated_at->toDateTimeString(),
         ];
     }
 }
