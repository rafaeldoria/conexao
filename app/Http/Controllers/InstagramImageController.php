<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InstagramImage;
use App\Models\Log;

class InstagramImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = InstagramImage::all();
        return $images;
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
        Log::create([
            'desc_log' => 'Imagem instagram adicionada.',
            'type_log_id' => 6,
            'user_id' => Session::get('userData.login')['id']
        ]); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
        Log::create([
            'desc_log' => 'Imagem instagram alterada '.$id.'.',
            'type_log_id' => 6,
            'user_id' => Session::get('userData.login')['id']
        ]); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Log::create([
            'desc_log' => 'Imagem instagram deletada '.$id.'.',
            'type_log_id' => 6,
            'user_id' => Session::get('userData.login')['id']
        ]);
    }
}
