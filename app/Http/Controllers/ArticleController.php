<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\TypeArticle;
use App\Http\Resources\ArticleTransformer;
use Session;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $breadcrumb = [
            ["title" => "Home", "route" => route('conexao')],
            ["title" => "Lista de Artigos", "route" => ""]
        ];

        $articles = Article::all();
        $typeArticle = TypeArticle::all();
        return view('admin.article', compact('breadcrumb', 'articles', 'typeArticle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $user_data_id = Session::get('userData.data')["id"];
        Article::create([
            'title' => $request['title'],
            'details_article' => '',
            'type_article_id' => $request->type_article,
            'user_data_id' => $user_data_id,
            'visibility' => 'N'
        ]);
        $request->session()->flash('alert-primary', 'Artigo adicionado');
        return redirect()->route('articles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);
        return $article->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Article::where('id', $id)
            ->update([
                'title' => $request['title'],
                'type_article_id' => $request["type_articleEdit"],
                'visibility' => $request['visibility'],
            ]);
        $request->session()->flash('alert-primary', 'Alteração Efetuada.');
        return redirect()->route('articles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $article = Article::find($id);
        $article->delete();
        $request->session()->flash('alert-warning', 'Artigo Deletado.');
        return redirect()->route('articles');
    }

    public function write($id)
    {   
        $breadcrumb = [
            ["title" => "Home", "route" => route('conexao')],
            ["title" => "Lista de Artigos", "route" => route('articles')],
            ["title" => "Escrever Artigo", "route" => ""]
        ];
        $article = Article::find($id);
        $typeArticle = TypeArticle::all();
        return view('admin.writeArticle', compact('breadcrumb', 'article', 'typeArticle'));
    }
}
