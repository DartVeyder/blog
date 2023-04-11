<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    public function descriptions()
    {
        return $this->hasMany(NewsDescription::class , 'news_id' , 'id');
    }

    public function category(){
        return $this->hasMany(CategoryDescription::class , 'category_id' , 'category_id');
    }

    public function categories(){
        return $this->hasMany(CategoryDescription::class , 'category_id' , 'category_id');
    }
 
}
