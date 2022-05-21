<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
      'third_id'
    ];


    public function slider()
    {
        return $this->hasMany(ThirdPage::class);
    }


    public function setCategoryAttribute($value)
    {
        $this->attributes['third_id'] = json_encode($value);
    }

    public function getCategoryAttribute($value)
    {
        return $this->attributes['third_id'] = json_decode($value);
    }
}
