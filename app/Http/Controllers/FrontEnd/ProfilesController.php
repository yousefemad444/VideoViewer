<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\FrontEnd\Users\UsersRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfilesController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->only('update');
    }

    public function index(User $user ,$slug=null){
        return view('front-end.profile.index',compact('user'));
    }

    public function update(User $user ,UsersRequest $request){
        $array=$request->all();
        if ($request->password == null){
            unset($array['password']);
        }else{
            $array['password']=Hash::make($request->password);
        }
        alert()->success('Your Profile Have been Updated','Done');
        $user->update($array);
        return redirect()->back();
    }
}
