<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use App\Models\UserData;
use App\Models\User;
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
    public function create($request, $id)
    {
        $date_birth= formatDateMysql($request->dt_birthDataEdit);
        $userData = [
            'user_id' => $id,
            'name' => $request->nameDataEdit,
            'dt_birth' => $date_birth,
            'desc_user' => $request->desc_userDataEdit
        ];
        return UserData::create($userData);
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
    public function edit(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        $userData = UserData::where('user_id', $user->id)->first();
        if(!isset($userData))
        {
            $userData = $this->create($request, $id);
        }else{
            $this->update($request, $id);
        }
        $this->saveImageProfile($request, $userData->id);
        User::where('id', $id)
            ->update([
                'username' => $request->usernameDataEdit,
                'email' => $request->emailDataEdit,
                'type_user_id' => $user->type_user_id,
            ]);

        Log::create([
            'desc_log' => 'Profile alterado '.$id.'.',
            'type_log_id' => 3,
            'user_id' => $id
        ]);

        $this->updateSession($id);
        
        $request->session()->flash('alert-primary', 'Alteração Efetuada.');
        return redirect()->route('profile');        
    }

    private function saveImageProfile($request, $userDataId)
    {
        if($request->hasFile('imageDataEdit') && $request->file('imageDataEdit')->isValid()){
            if(Session::get('userData.data')['img_user_link']){
                $filename = Session::get('userData.data')['img_user_link'];
            }else{
                $filename = 'perfil-'.kebab_case($request->usernameDataEdit).'-'.$userDataId;
                $extension = $request->imageDataEdit->extension();
                $filename = "{$filename}.{$extension}";
            }
            $upload = $request->imageDataEdit->storeAs('images/profiles', $filename);
            if(!$upload){
                redirect()->back->with('error', 'Falha ao realizar upload de imagem.');
            }
            UserData::where('id', $userDataId)
                ->update([
                    'img_user_link' => $filename
                ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($request, $id)
    {   
        $date_birth= formatDateMysql($request->dt_birthDataEdit);
        UserData::where('user_id', $id)
            ->update([
                'name' => $request->nameDataEdit,
                'dt_birth' => $date_birth,
                'desc_user' => $request->desc_userDataEdit,
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
    }

    private function updateSession($id)
    {
        $user = User::where('id', $id)->first();
        Session::put('userData.login', $user);
        $userData = UserData::where('user_id', $id)->first();
        Session::put('userData.data', $userData);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'user_id' => 'required|int',
            'name' => 'required|string|max:255',
        ]);
    }
    
}
