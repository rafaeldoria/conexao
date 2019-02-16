<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Article;
use App\Models\TypeArticle;
use App\Models\InstagramImage;
use App\Models\Log;
use App\Models\UserData;
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

    public function view()
    {   
        $breadcrumb = [
            ["title" => "Home", "route" => route('conexao')],
            ["title" => "Lista de Artigos", "route" => ""]
        ];

        $articles = Article::all();
        $typeArticle = TypeArticle::all();
        dd($articles);
        return view('articles', compact('breadcrumb', 'articles', 'typeArticle'));
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
        $this->validator($request->all())->validate();
        $user_data_id = Session::get('userData.data')["id"];
        Article::create([
            'title' => $request['title'],
            'details_article' => '',
            'summary' => 'Insira detalhes',
            'type_article_id' => $request->type_article,
            'user_data_id' => $user_data_id,
            'visibility' => 'N'
        ]);
        $request->session()->flash('alert-primary', 'Artigo adicionado');
        Log::create([
            'desc_log' => 'Adicionou novo artigo',
            'type_log_id' => 2,
            'user_id' => Session::get('userData.login')['id']
        ]);
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
        $this->validator($request->all())->validate();
        Article::where('id', $id)
            ->update([
                'title' => $request['title'],
                'type_article_id' => $request["type_articleEdit"],
                'visibility' => $request['visibility'],
            ]);
        $request->session()->flash('alert-primary', 'Alteração Efetuada.');
        Log::create([
            'desc_log' => 'Alteração efetuado no artigoId '.$id,
            'type_log_id' => 2,
            'user_id' => Session::get('userData.login')['id']
        ]);
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
        Log::create([
            'desc_log' => 'Deletou artigoId '.$id,
            'type_log_id' => 2,
            'user_id' => Session::get('userData.login')['id']
        ]);
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

    public function Save(Request $request, $id)
    {   
        $this->validator($request->all())->validate();
        Article::where('id', $id)
            ->update([
                'title' => $request['title'],
                'summary' => $request['summary'],
                'details_article' => $request['details_article'],
                'type_article_id' => $request["type_articleEdit"],
            ]);
        $request->session()->flash('alert-primary', 'Detalhes Artigo guardado.');
        Log::create([
            'desc_log' => 'Adicionou detalhes em artigoId '.$id,
            'type_log_id' => 2,
            'user_id' => Session::get('userData.login')['id']
        ]);
        return redirect()->route('articles');
    }

    public function alterVisibility(Request $request, $id)
    {
        $article = Article::find($id);
        $visibility = $article->visibility == 'S' ? 'N' : 'S';
        Article::where('id', $id)
            ->update([
                'visibility' => $visibility,
            ]);
        
        Log::create([
            'desc_log' => 'Alterou visibilidade para: '.$visibility.' em artigoId '.$id,
            'type_log_id' => 2,
            'user_id' => Session::get('userData.login')['id']
        ]);
        $request->session()->flash('alert-primary', 'Visualização Alterada.');
    }

    public function read($id)
    {
        $article = Article::find($id);
        $breadcrumb = [
            ["title" => "Home", "route" => route('home')],
            ["title" => "Artigos", "route" => route('allArticles')],
            ["title" => $article->title, "route" => ""],
        ];

        $active = $article->title;
        $typeArticles = TypeArticle::all();
        $imagesInstagram = InstagramImage::where('visibility', 'S')->get();
        $userData = UserData::find($article->user_data_id);
        return view('singleArticle', compact('breadcrumb', 'article', 'typeArticles', 'userData', 'imagesInstagram', 'active'));
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => 'required|string|max:255',
            'summary' => 'string|max:255',
            'visibility' => 'string|max:1',
        ]);
    }

}
