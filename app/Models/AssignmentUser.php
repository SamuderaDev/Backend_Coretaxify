<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class AssignmentUser extends Model
{
    /** @use HasFactory<\Database\Factories\AssignmentUserFactory> */
    use HasFactory;

    protected $guarded = ['id'];
}
