<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Newsletter;
use Session;

class NewsletterController extends Controller
{
    public function addNewsletter(Request $request)
    {
        Newsletter::create([
            'email' => $request->email,
            'subscription' => 'S',
        ]);
        $request->session()->flash('alert-new', 'OK!.');
        $id_article = Session::get('userData.article');
        if($id_article == '/'){
            return redirect('/');
        }
        return redirect()->route('readArticle', ['id' => $id_article]);
    }
}
