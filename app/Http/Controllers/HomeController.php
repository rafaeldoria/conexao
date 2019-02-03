<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\TypeArticle;
use App\Models\InstagramImage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $articles = Article::where('visibility', 'S')->get();
        $typeArticles = TypeArticle::where('status_type_article', 'A')->get();
        $fourArticles = Article::where('visibility', 'S')->orderBy('created_at', 'desc')->limit(2)->get();
        $imagesInstagram = InstagramImage::where('visibility', 'S')->get();
        return view('index', compact('articles', 'typeArticles', 'fourArticles', 'imagesInstagram'));
    }

    public function contact()
    {
        $typeArticles = TypeArticle::where('status_type_article', 'A')->get();
        return view('contact', compact('typeArticles'));
    }

    public function about()
    {
        $typeArticles = TypeArticle::where('status_type_article', 'A')->get();
        return view('about', compact('typeArticles'));
    }
}
