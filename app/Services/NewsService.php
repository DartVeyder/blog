<?php
namespace App\Services;

use App\Models\News;
use App\Models\Categories;

class NewsService
{
    public function getNews($limit = 10)
    {
        $news = News::with(['category' , 'descriptions'])
        ->limit($limit)
        ->get();
        return $news;
    }

    public function getNewsById($id)
    {
        $news = News::with(['category' , 'descriptions'])
        ->findOrFail($id)  ;

        return $news;
    }

    public function generateStatistics()
    {
        $totalNews = News::count();
        $totalCategories = Categories::count();

        return [
            'total_news' => $totalNews,
            'total_categories' => $totalCategories,
        ];
    }
}