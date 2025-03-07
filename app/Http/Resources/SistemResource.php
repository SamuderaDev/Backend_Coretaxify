<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SistemResource extends JsonResource {
    public function toArray($request): array {
        return [
            'id' => $this->id,
            'assignment_user' => new AssignmentUserResource($this->assignment_user),
            'portal_saya' => new PortalSayaResource($this->portal_saya),
            'nama_akun' => $this->nama_akun,
            'npwp_akun' => $this->npwp_akun,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}