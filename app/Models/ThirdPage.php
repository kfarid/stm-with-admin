<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ThirdPage extends Model
{
    use HasFactory, SoftDeletes, Sluggable;


    protected $dates = ['deleted_at'];


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
        'card_id',
        'panel_id',
        'textarea_en',
        'textarea_az',
        'textarea_ru',
        'textarea_tr'
    ];


    public function secondpage()
    {
        return $this->belongsTo('App\Models\SecondPage', 'second_id');
    }

    public function panel()
    {
        return $this->belongsTo('App\Models\Panel', 'panel_id');
    }

    public function card()
    {
        return $this->belongsTo('App\Models\Card', 'card_id');
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
