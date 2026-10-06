<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseContent extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'total_hours',
        'content_info',
        'course_id'
    ];

    protected $guarded = ['id'];
}
