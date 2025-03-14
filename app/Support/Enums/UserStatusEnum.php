<?php

namespace App\Support\Enums;

use App\Traits\Enums\Arrayable;

enum UserStatusEnum: string {
    use Arrayable;

    case ACTIVE = 'ACTIVE';
    case INACTIVE = 'INACTIVE';
}
