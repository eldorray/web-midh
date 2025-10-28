<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tonysm\RichTextLaravel\Models\Traits\HasRichText;

class VisiMisi extends Model
{
    use HasFactory;
    use HasRichText;

    protected $fillable = ['visi', 'misi', 'tujuan', 'motto', 'sejarah', 'image'];

    protected $richTextAttributes = [
        'misi',
        'tujuan',
    ];




}
