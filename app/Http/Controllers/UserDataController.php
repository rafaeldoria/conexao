<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use App\Models\UserData;
use App\Models\Log;
use App\Http\Resources\UserDataTransformer;
use Session;

class UserDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userData = [
            'user_id' => Auth::user()->id,
            'name' => 'Rafael Dória',
            'dt_birth' => '2019-01-06',
            'desc_user' => 'teste',
        ];
        UserData::create($userData);
        $userData = UserData::where('user_id', Auth::user()->id)->first();
        if(isset($userData)){
            $userData = (new UserDataTransformer)->toArray($userData);
            Session::put('userData.data', $userData);
        }
        dd(Session::get('userData'));
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        dd('oi');
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
        if($request->hasFile('imageDataEdit') && $request->file('imageDataEdit')->isValid()){
            if(Session::get('userData.data')['img_user_link']){
                $filename = Session::get('userData.data')['img_user_link'];
            }else{
                $filename = 'perfil-'.kebab_case($request->name).'-'.$id;
                $extension = $request->imageDataEdit->extension();
                $filename = "{$filename}.{$extension}";
            }
            $upload = $request->imageDataEdit->storeAs('images/profiles/', $filename);
            if(!$upload){
                redirect()->back->with('error', 'Falha ao realizar upload de imagem.');
            }
            UserData::where('id', $id)
                ->update([
                    'img_user_link' => $filename
                ]);
        }
 
        $date_birth= formatDateMysql($request->dt_birthDataEdit);
        UserData::where('id', $id)
            ->update([
                'name' => $request->nameDataEdit,
                'dt_birth' => $date_birth,
                'desc_user' => $request->desc_userDataEdit,
            ]);
        $user = UserData::find($id)->user();
        $user->update([
            'username' => $request->usernameDataEdit,
            'email' => $request->emailDataEdit,
        ]);
        Log::create([
            'desc_log' => 'Profile alterado '.$id.'.',
            'type_log_id' => 3,
            'user_id' => Session::get('userData.login')['id']
        ]);
        $request->session()->flash('alert-primary', 'Alteração Efetuada.');
        return redirect()->route('profile');
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
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'user_id' => 'required|int',
            'name' => 'required|string|max:255',
        ]);
    }
    
}
