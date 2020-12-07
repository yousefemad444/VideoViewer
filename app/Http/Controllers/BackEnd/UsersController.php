<?php

namespace App\Http\Controllers\BackEnd;


use App\Http\Requests\BackEnd\Users\StoreRequest;
use App\Http\Requests\BackEnd\Users\UpdateRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends BackEndController
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function store(StoreRequest $request)
    {
        $requestArray=$request->all();
        $requestArray['password']=Hash::make($request->password);
        User::create($requestArray);
        alert()->success('Added Successfully','Done');
        return redirect()->route('users.index');
    }

    public function update(User $user ,UpdateRequest $request)
    {
        $requestArray=$request->all();
        if (isset($requestArray['password'])&& $requestArray['password']!=""){
            $requestArray['password']=Hash::make($request->password);
        }else{
            unset($requestArray['password']);
        }
        $user->update($requestArray);
        alert()->success('Updated Successfully','Done');
        return redirect()->route('users.edit',$user->id);
    }

}
