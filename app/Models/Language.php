<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;
      /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'languages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'code',
        // додаткові поля, якщо є
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        // поля, які не потрібно виводити
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        // поля, які потрібно приводити до певних типів даних
    ];

    /**
     * Get the news descriptions for the language.
     */
    public function newsDescriptions()
    {
        return $this->hasMany(NewsDescription::class, 'news_id' , 'id');
    }

    /**
     * Get the category descriptions for the language.
     */
    public function categoryDescriptions()
    {
        return $this->hasMany(CategoryDescription::class, 'category_id' , 'id');
    }
}
