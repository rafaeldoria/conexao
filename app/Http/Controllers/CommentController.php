<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Comment;
use App\Models\Log;
use Session;

class CommentController extends Controller
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
            ["title" => "Comentários", "route" => ""]
        ];

        $comments = Comment::paginate(10);
        $menus = $this->getMenus();
        return view('admin.comment', compact('breadcrumb', 'comments' ,'menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $id_article = Session::get('userData.article');
        Comment::create([
            'txt_message' => $request->txt_message,
            'article_id' => $id_article,
            'user_id' => Session::get('userData.data')["id"]
        ]);
        Log::create([
            'desc_log' => 'Comentário adicionado no artigo '.$id_article,
            'type_log_id' => 4,
            'user_id' => Session::get('userData.login')['id']
        ]); 
        return redirect()->route('readArticle', ['id' => $id_article]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment = Comment::find($id);
        return $comment->toJson();
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
        Comment::where('id', $id)
            ->update([
                'txt_message' => $request['txt_mensagemEdit'],
            ]);
        Log::create([
            'desc_log' => 'Alteração no comentário '.$id.' via admin.',
            'type_log_id' => 4,
            'user_id' => Session::get('userData.login')['id']
        ]); 
        $request->session()->flash('alert-primary', 'Alteração Efetuada.');
        return redirect()->route('comments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        Log::create([
            'desc_log' => 'Comentário '.$id.' deletado via admin.',
            'type_log_id' => 4,
            'user_id' => Session::get('userData.login')['id']
        ]); 
        $request->session()->flash('alert-warning', 'Comentário Deletado.');
        return redirect()->route('comments');
    }

    public function view($id)
    {
        $comment = Comment::find($id);
        $comment->article_title = $comment->article->title;
        $comment->username = $comment->user->username;
        $comment->data_created = formatDateAndTime($comment->created_at, 'd/m/Y');
        return $comment->toJson();
    }

    protected function validator(array $data)
    {   
        return Validator::make($data, [
            'txt_message' => 'required|string|max:255',
        ]);
    }
}
