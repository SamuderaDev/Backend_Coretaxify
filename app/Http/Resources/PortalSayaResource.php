<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PortalSayaResource extends JsonResource {
    public function toArray($request): array {
        return [
            'id' => $this->id,
            'profil_saya' => new ProfilSayaResource($this->profil_saya),
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}