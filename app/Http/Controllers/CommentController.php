<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

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

        $comments = Comment::all();
        return view('admin.comment', compact('breadcrumb', 'comments'));
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
        //
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
}
