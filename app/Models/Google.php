<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Google extends Model
{
    use HasFactory;

    protected $fillable = [
        'analytics_link',
        'analytics_script',
        'search_script',
        'tag_link',
        'tag_script_head',
        'tag_script_body'
    ];
}
