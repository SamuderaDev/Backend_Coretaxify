<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InformasiTambahanResource extends JsonResource {
    public function toArray($request): array {
        return [
            'id' => $this->id,
            'informasi_tambahan'=> $this->informasi_tambahan,
            'kode' => $this->kode,
            'keterangan' => $this->keterangan,
            'cap_fasilitas' => $this->cap_fasilitas,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}