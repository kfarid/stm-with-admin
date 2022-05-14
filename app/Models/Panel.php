<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Panel extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name_en',
        'name_az',
        'name_ru',
        'name_tr',
        'third_id',
        'text_en',
        'text_az',
        'text_ru',
        'text_tr'
    ];

    public function thirdpage()
    {
        return $this->belongsTo('App\Models\ThirdPage', 'third_id');
    }
}
