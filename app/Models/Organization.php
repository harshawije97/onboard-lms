<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    /** @use HasFactory<\Database\Factories\OrganizationFactory> */
    use HasFactory, HasUuids;

    protected $fillable = [
        'name',
        'short_description',
        'description',
        'no_of_users',
        'no_of_admins'
    ];
}
