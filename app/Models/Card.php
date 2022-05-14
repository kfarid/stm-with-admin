<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Card extends Model
{
    use HasFactory,SoftDeletes;

    protected $dates = ['deleted_at'];


    protected $fillable = [
        'category',
        'img',
        'title',
        'location',
        'phone',
        'fax',
        'email',
        'link',
        'third_id'
    ];

    public function thirdpage()
    {
        return $this->belongsTo('App\Models\ThirdPage', 'third_id');
    }
}
