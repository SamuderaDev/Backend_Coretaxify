<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Assignment extends Model
{
    protected $guarded = ['id'];

    protected $fillable = [
        'group_id',
        'user_id',
        'task_id',
        'name',
        'assignment_code',
        'start_period',
        'end_period',
        'supporting_file',
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'assignment_users');
    }

    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }

    // Many To Many
    // public function groups(): BelongsToMany {
    //     return $this->belongsToMany(Group::class, 'group_assignments');
    // }

    // 1 Praktikum 1 Kelas
    public function group(): BelongsTo {
        return $this->belongsTo(Group::class);
    }


    public function task(): BelongsTo {
        return $this->belongsTo(Task::class);
    }

    // public function task()    {
    //     return $this->belongsTo(Task::class);
    // }

    public static function generateTaskCode($existingNumber = null) {
        // $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

        // if($existingNumber) {
        //     $number = $existingNumber;
        // } else {
        //     do {
        //         $code = '';
        //         for ($i = 0; $i < 5; $i++) {
        //             $code .= $characters[rand(0, strlen($characters) - 1)];
        //         }

        //         $exists = self::where('assignment_code', $code)->exists();
        //     } while ($exists);

        //     $number = $code;
        // }

        // return str_pad($number, 5, '0', STR_PAD_LEFT);
        $randomString = strtoupper(Str::random(5));
        return $randomString;
    }
}
