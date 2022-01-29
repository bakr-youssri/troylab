<?php
namespace App\Http\Controllers\Api;

use App\Http\Requests\RegisterRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Traits\CoreJsonTrait;
use App\Models\User;

class UserController extends Controller
{
    use CoreJsonTrait;
    /**
    * Display the specified resource.
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function profile()
    {
        $user = Auth::guard('api')->user();
        return $this->ok([new UserResource($user)]);
    }
 
    /**
    * Update the specified resource in storage.
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(RegisterRequest $request,User $user)
    {
        $data = $request->validated();
        if(!empty($data['password'])){
            $data['password'] = Hash::make($data['password']);
        }
        $user->update($data);
        return $this->ok([new UserResource($user)], null, __("translate.general.success_update"));
    }
}