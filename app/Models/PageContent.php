<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageContent extends Model
{
    protected $fillable = [
        'page_name',
        'title',
        'content',
        'meta_description',
        'settings',
    ];

    protected $casts = [
        'settings' => 'array',
    ];
}
