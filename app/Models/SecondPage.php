<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SecondPage extends Model
{
    use HasFactory, SoftDeletes, Sluggable;


    protected $fillable = [
        'title_en',
        'title_az',
        'title_ru',
        'title_tr',
        'img',
        'sec_id',
        'slug_en',
        'slug_az',
        'slug_ru',
        'slug_tr',
        'home_id'
    ];

    protected $dates = ['deleted_at'];

    public function homepage()
    {
        return $this->belongsTo('App\Models\HomePage', 'home_id');
    }


      /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug_en' => [
                'source' => 'title_en'
            ],
            'slug_az' => [
                'source' => 'title_az'
            ],
            'slug_ru' => [
                'source' => 'title_ru'
            ],
            'slug_tr' => [
                'source' => 'title_tr'
            ]
        ];
    }
}
