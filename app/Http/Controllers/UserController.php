<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\TypeUser;
use App\Models\TypeArticle;
use App\Http\Resources\UserTransformer;

class UserController extends Controller
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
            ["title" => "Lista de Usuários", "route" => ""]
        ];

        $users = User::all();
        $typeUser = TypeUser::all();
        return view('admin.user', compact('breadcrumb', 'users', 'typeUser'));
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
        User::create([
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'type_user_id' => $request->type_user,
        ]);
        $request->session()->flash('alert-primary', 'Usuário adicionado');
        return true;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return $user->toJson();
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
        User::where('id', $id)
            ->update([
                'username' => $request['usernameEdit'],
                'email' => $request['emailEdit'],
                'type_user_id' => $request['type_userEdit'],
            ]);
        $request->session()->flash('alert-primary', 'Alteração Efetuada.');
        return redirect()->route('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $user = User::find($id);
        $user->delete();
        $request->session()->flash('alert-warning', 'Usuário Deletado.');
        return redirect()->route('users');
    }

    public function showComplete($id)
    {   
        $user = User::select('users.id', 'users.username', 'users.email', 'users.created_at', 'users.type_user_id',
                        'user_datas.name', 'user_datas.dt_birth', 'user_datas.desc_user', 'user_datas.img_user_link', 'user_datas.total_articles')
                ->join('user_datas', 'users.id', '=', 'user_datas.user_id')
                ->where('users.id', $id)
                ->first();
        if(!$user) {
            $user = User::select('id', 'username', 'email', 'created_at', 'type_user_id')
                    ->where('id', $id)
                    ->first();

            $user = (new UserTransformer)->toArray($user);
            $typeUser = TypeUser::select('desc_type_user')
                ->where('id', $user["type_user_id"])
                ->first()->getOriginal();
            $user["desc_type_user"] = $typeUser["desc_type_user"];
            $user["created_at"] = formatDateAndTimeformatDateAndTime($user["created_at"]->toDateString(), 'd/m/Y');
            return $user;
        }
        $user = $user->getOriginal();
        $typeUser = TypeUser::select('desc_type_user')
                ->where('id', $user["type_user_id"])
                ->first()->getOriginal();
        $user["desc_type_user"] = $typeUser["desc_type_user"];
        $user["created_at"] = formatDateAndTime($user["created_at"], 'd/m/Y');
        $user["dt_birth"] = formatDateAndTime($user["dt_birth"], 'd/m/Y');
        
        return $user; 
    }

    public function view()
    {
        $breadcrumb = [
            ["title" => "Home", "route" => route('conexao')],
            ["title" => "Perfil de Usuário", "route" => ""]
        ];
        $user = $this->showComplete(Auth::user()->id);
        $typeArticles = TypeArticle::where('status_type_article', 'A')->get();
        $active = '';
        return view('profile', compact('breadcrumb','user','typeArticles','active'));
    }
}