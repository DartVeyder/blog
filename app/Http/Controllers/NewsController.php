<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Categories;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function index($count)
    { 
        
        $news = News::with(['category' , 'descriptions'])
        ->limit($count)
        ->get();
        
        return response()->json($news);
    }

    public function show($id){
        $news = News::with(['category' , 'descriptions'])
        ->findOrFail($id)  ;
       
        return response()->json($news);
    }

}
