<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Categories;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function index( )
{
    $languageId = 1; // id потрібної мови

    $news = News::select('news.id', 'news.created_at', 'news.updated_at', 'category_descriptions.name')
    ->join('categories', 'category.id', '=', 'news.category_id')
    ->join('news_description', 'news_description.id', '=', 'news.id')
    ->where('category_descriptions.language_id', $languageId)
    ->where('news_description.language_id', $languageId)
    ->get();

    dd($news);
 
}
}
