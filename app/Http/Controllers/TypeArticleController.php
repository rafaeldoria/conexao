<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeArticle;

class TypeArticleController extends Controller
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
            ["title" => "Menus Artigos", "route" => ""]
        ];

        $typeArticle = TypeArticle::paginate(10);
        $menus = $this->getMenus();
        return view('admin.typesarticle', compact('breadcrumb', 'typeArticle', 'menus'));
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
        TypeArticle::create([
            'desc_type_article' => $request->desc_type,
            'status_type_article' => $request->status_type,
        ]);
        $request->session()->flash('alert-primary', 'Menu adicionado');
        return redirect()->route('typesarticles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $typeArticle = TypeArticle::find($id);
        return $typeArticle->toJson();
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
        $this->saveImgArticle($request, $id);
        TypeArticle::where('id', $id)
            ->update([
                'desc_type_article' => $request->desc_type,
                'status_type_article' => $request->status_type,
            ]);
        $request->session()->flash('alert-primary', 'Alteração Efetuada.');
        return redirect()->route('typesarticles');
    }

    private function saveImgArticle($request, $id)
    {
        if($request->hasFile('imageMenu') && $request->file('imageMenu')->isValid()){
            $typeArticle = TypeArticle::find($id);
            if($typeArticle->img_type_article){
                $filename = $typeArticle->img_type_article;
            }else{
                $filename = 'menu-'.kebab_case($request->desc_type).'-'.$id;
                $extension = $request->imageMenu->extension();
                $filename = "{$filename}.{$extension}";
            }
            $upload = $request->imageMenu->storeAs('images/articles/type/', $filename);
            if(!$upload){
                redirect()->back->with('error', 'Falha ao realizar upload de imagem.');
            }
            TypeArticle::where('id', $id)
                ->update([
                    'img_type_article' => $filename
                ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $typearticle = TypeArticle::find($id);
        $typearticle->delete();
        $request->session()->flash('alert-danger', 'Menu Deletado.');
        return redirect()->route('typesarticles');
    }
}
