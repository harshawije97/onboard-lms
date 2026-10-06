<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentMedia extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = ['id'];
    protected $fillable = [
        'media_type',
        'title',
        'content',
        'min_completion_time',
        'course_id',
        'meta_data'
    ];
}
