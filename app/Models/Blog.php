<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Tonysm\RichTextLaravel\Models\Traits\HasRichText;

class Blog extends Model
{
    use HasRichText;

    protected $fillable = [
        'thumbnail',
        'title',
        'slug',
        'content',
        'author',
        'tags',
        'is_published',
    ];

    protected $richTextAttributes = [
        'content',
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];
}
