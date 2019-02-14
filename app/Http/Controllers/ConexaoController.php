<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\UserData;
use App\Models\User;
use App\Http\Resources\UserTransformer;
use App\Http\Resources\UserDataTransformer;
use Illuminate\Support\Facades\Mail;

class ConexaoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $user = (new UserTransformer)->toArray(Auth::user());
        Session::put('userData.login', $user);
        $userData = UserData::where('user_id', Auth::user()->id)->first();
        if(isset($userData)){
            $userData = (new UserDataTransformer)->toArray($userData);
            Session::put('userData.data', $userData);
        }
        return view('admin.conexao');
    }

}
