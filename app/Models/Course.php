<?php

namespace App\Models;

use App\Enums\UserLevel;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory, HasUuids;

    protected $casts = [
        'user_level' => UserLevel::class,
    ];

    protected $fillable = [
        'name',
        'course_type',
        'description',
        'user_level',
        'thumbnail',
        'learning_outcome',
        'created_by',
        'org_id',
    ];
}
