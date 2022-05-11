<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HomePage extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $fillable = [
        'title_en',
        'title_az',
        'title_ru',
        'title_tr',
        'img',
        'slug_en',
        'slug_az',
        'slug_ru',
        'slug_tr'
    ];

    protected $dates = ['deleted_at'];

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
