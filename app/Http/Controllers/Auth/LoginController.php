<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\TypeArticle;
use App\Models\UserData;
use App\Models\User;
use App\Http\Resources\UserTransformer;
use App\Http\Resources\UserDataTransformer;
use Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        $typeArticles = TypeArticle::where('status_type_article', 'A')->get();
        $active = 'home';
        return view('auth.login', compact('typeArticles', 'active'));
    }

    public function username()
    {
        $identity  = request()->get('identity');
        $fieldName = filter_var($identity, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        request()->merge([$fieldName => $identity]);
        return $fieldName;
    }

    protected function validateLogin(Request $request)
    {
        $this->validate(
            $request,
            [
                'identity' => 'required|string',
                'password' => 'required|string',
            ],
            [
                'identity.required' => 'Username or email is required',
                'password.required' => 'Password is required',
            ]
        );
    }

    protected function authenticated(Request $request, $user)
    {
        $request->session()->flash('alert-success', trans('auth.login-success'));
        $user = (new UserTransformer)->toArray($user);
        Session::put('userData.login', $user);
        $userData = UserData::where('user_id', $user['id'])->first();
        if(isset($userData)){
            $userData = (new UserDataTransformer)->toArray($userData);
            Session::put('userData.data', $userData);
        }
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $request->session()->flash('alert-danger', trans('auth.failed'));
        throw ValidationException::withMessages(
            [
                'error' => [trans('auth.failed')],
            ]
        );
    }
}
