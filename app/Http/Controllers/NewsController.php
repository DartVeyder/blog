<?php

namespace App\Http\Controllers; 
use App\Services\NewsService;
use Illuminate\Http\JsonResponse; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class NewsController extends Controller
{
    private $newsService;

    public function __construct(NewsService $newsService)
    { 
        $this->newsService = $newsService;
    } 

    public function getNews($count) : JsonResponse
    {    
        $news = $this->newsService->getNews($count);
        
        return response()->json($news);
    }

    public function getNewsById($id) : JsonResponse{
        
        $news = $this->newsService->getNewsById($id);

        if (!$news) {
            return response()->json(['error' => 'Resource not found'], 404);
        }

        return response()->json($news);
    }

}
