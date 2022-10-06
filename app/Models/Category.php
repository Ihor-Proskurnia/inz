<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected array $fillable = [
        'id',
        'name',
        'description',
        'excerpt',
    ];
}
