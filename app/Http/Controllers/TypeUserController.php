<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeUser;

class TypeUserController extends Controller
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
            ["title" => "Tipos de Usuários", "route" => ""]
        ];

        $typeUser = TypeUser::all();
        $menus = $this->getMenus();
        return view('admin.typesuser', compact('breadcrumb', 'typeUser', 'menus'));
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
        TypeUser::create([
            'desc_type_user' => $request->desc_type,
            'status_type_user' => $request->status_type,
        ]);
        $request->session()->flash('alert-primary', 'Novo tipo adicionado');
        return redirect()->route('typesusers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $typeUser = TypeUser::find($id);
        return $typeUser->toJson();
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
        TypeUser::where('id', $id)
            ->update([
                'desc_type_user' => $request->desc_type,
                'status_type_user' => $request->status_type,
            ]);
        $request->session()->flash('alert-primary', 'Alteração Efetuada.');
        return redirect()->route('typesusers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $typeuser = TypeUser::find($id);
        $typeuser->delete();
        $request->session()->flash('alert-danger', 'Tipo Deletado.');
        return redirect()->route('typesusers');
    }
}
