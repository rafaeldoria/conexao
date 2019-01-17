<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use Session;
use App\Models\Article;
// use App\Http\Resources\UserTransformer;
// use App\Http\Resources\UserDataTransformer;

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
        return view('index', compact('articles'));
    }
}
