<?php

namespace App\Http\Requests\User;

use App\Support\Enums\IntentEnum;
use App\Support\Enums\UserStatusEnum;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest {
    public function rules(): array {
        $intent = $this->get('intent');

        switch ($intent) {
            case IntentEnum::API_USER_IMPORT_DOSEN->value:
                return [
                    'contract_id' => 'required|integer|exists:contracts,id',
                    'import_file' => 'required|file|mimes:xlsx,xls',
                    'status' => 'required|in:' . implode(',', UserStatusEnum::toArray()),
                ];
            case IntentEnum::API_USER_IMPORT_MAHASISWA_PSC->value:
                return [
                    'group_id' => 'sometimes|exists:groups,id',
                    'import_file' => 'required|file|mimes:xlsx,xls',
                    'status' => 'required|in:' . implode(',', UserStatusEnum::toArray()),
                ];
            case IntentEnum::API_USER_CREATE_ADMIN->value:
                return [
                    'name' => 'required|string',
                    'email' => 'required|string|email',
                    'status' => 'required|in:' . implode(',', UserStatusEnum::toArray()),
                ];
            case IntentEnum::API_USER_CREATE_PSC->value:
                return [
                    'name' => 'required|string',
                    'email' => 'required|string|email',
                    'status' => 'required|in:' . implode(',', UserStatusEnum::toArray()),
                ];
            case IntentEnum::API_USER_CREATE_MAHASISWA_PSC->value:
                return [
                    'name' => 'required|string',
                    'email' => 'required|string|email',
                    'status' => 'required|in:' . implode(',', UserStatusEnum::toArray()),
                ];
            case IntentEnum::API_USER_CREATE_INSTRUKTUR->value:
                return [
                    'name' => 'required|string',
                    'email' => 'required|string|email',
                    'status' => 'required|in:' . implode(',', UserStatusEnum::toArray()),
                ];
            default:
                return [
                    'contract_id' => 'required|integer|exists:contracts,id',
                    'name' => 'required|string',
                    'email' => 'required|string|email',
                    'status' => 'required|in:' . implode(',', UserStatusEnum::toArray()),
                ];
        }
    }
}
