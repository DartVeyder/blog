<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsDescription extends Model
{
    use HasFactory;
    protected $table = 'news_descriptions';
    public $timestamps = false;
 

    public function news()
    {
        return $this->belongsTo(News::class);
    }

   
}
