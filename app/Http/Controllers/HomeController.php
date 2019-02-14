<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\TypeArticle;
use App\Models\InstagramImage;
use App\Mail\SendMailContact;
use Session;

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
        $active = 'home';
        return view('index', compact('articles', 'typeArticles', 'fourArticles', 'imagesInstagram', 'active'));
    }

    public function contact()
    {
        $typeArticles = TypeArticle::where('status_type_article', 'A')->get();
        $active = 'contact';
        return view('contact', compact('typeArticles', 'active'));
    }

    public function about()
    {
        $typeArticles = TypeArticle::where('status_type_article', 'A')->get();
        $active = 'about';
        return view('about', compact('typeArticles', 'active'));
    }

    public function sendContactNotification(Request $request)
    {   
        Mail::to('conexa@conexaonerd.com.br')->send(new SendMailContact($request));
        $request->session()->flash('email-success', 'Email enviado com sucesso');
        return redirect()->route('contact');
    }
}
