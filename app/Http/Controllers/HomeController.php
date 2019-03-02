<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\TypeArticle;
use App\Models\InstagramImage;
use App\Mail\SendMailContact;
use App\Models\Log;
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
        $fourArticles = Article::where('visibility', 'S')->orderBy('created_at', 'desc')->limit(4)->get();
        $imagesInstagram = InstagramImage::where('visibility', 'S')->get();
        $active = 'home';
        return view('web.conexao.index', compact('articles', 'typeArticles', 'fourArticles', 'imagesInstagram', 'active'));
    }

    public function contact()
    {
        $typeArticles = TypeArticle::where('status_type_article', 'A')->get();
        $active = 'contact';
        return view('web.conexao.contact', compact('typeArticles', 'active'));
    }

    public function about()
    {
        $typeArticles = TypeArticle::where('status_type_article', 'A')->get();
        $active = 'about';
        return view('web.conexao.about', compact('typeArticles', 'active'));
    }

    public function sendContactNotification(Request $request)
    {   
        Mail::to('conexa@conexaonerd.com.br')->send(new SendMailContact($request));
        Log::create([
            'desc_log' => 'Email enviado.',
            'type_log_id' => 5,
            'user_id' => 0
        ]); 
        $request->session()->flash('email-success', 'Email enviado com sucesso');
        return redirect()->route('contact');
    }
}
