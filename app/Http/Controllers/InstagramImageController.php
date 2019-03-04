<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InstagramImage;
use App\Models\Log;
use Session;

class InstagramImageController extends Controller
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
            ["title" => "Instagram Detalhes", "route" => ""]
        ];
        $instagrams = InstagramImage::all();
        $menus = $this->getMenus();
        return view('admin.instagram', compact('breadcrumb', 'instagrams', 'menus'));
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
        InstagramImage::create([
            'desc_image' => $request->desc_image,
            'visibility' => $request->visibility,
        ]);
        $request->session()->flash('alert-primary', 'Imagem Instagram adicionado');
        Log::create([
            'desc_log' => 'Imagem instagram adicionada.',
            'type_log_id' => 6,
            'user_id' => Session::get('userData.login')['id']
            ]); 
        return redirect()->route('instagram');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $InstagramImage = InstagramImage::find($id);
        return $InstagramImage->toJson();
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
        $this->saveImageI($request, $id);
        InstagramImage::where('id', $id)
            ->update([
                'desc_image' => $request->desc_image,
                'visibility' => $request->visibility,
                'link_instagram' => $request->link_instagram,
            ]);
        $request->session()->flash('alert-primary', 'Alteração Efetuada.');
        Log::create([
            'desc_log' => 'Imagem instagram alterada '.$id.'.',
            'type_log_id' => 6,
            'user_id' => Session::get('userData.login')['id']
        ]); 
        return redirect()->route('instagram');
    }

    private function saveImageI($request, $id)
    {
        if($request->hasFile('img_instagram') && $request->file('img_instagram')->isValid()){
            $imageI = InstagramImage::find($id);
            if($imageI->img_instagram){
                $filename = $imageI->img_instagram;
            }else{
                $filename = 'imagei-'.kebab_case($request->desc_image).'-'.$id;
                $extension = $request->img_instagram->extension();
                $filename = "{$filename}.{$extension}";
            }
            $upload = $request->img_instagram->storeAs('images/instagram/', $filename);
            if(!$upload){
                redirect()->back->with('error', 'Falha ao realizar upload de imagem.');
            }
            InstagramImage::where('id', $id)
                ->update([
                    'img_instagram' => $filename
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
        $imageI = InstagramImage::find($id);
        $imageI->delete();
        $request->session()->flash('alert-warning', 'Imagem Instagram Deletada.');
        Log::create([
            'desc_log' => 'Imagem instagram deletada '.$id.'.',
            'type_log_id' => 6,
            'user_id' => Session::get('userData.login')['id']
        ]);
        return redirect()->route('instagram');
    }
}
