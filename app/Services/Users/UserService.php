<?php


namespace App\Services\Users;




use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function storeUser(Request $request)
    {
        return User::create([
            'name'=>$request->name,
            'user_type_id'=>$request->user_type_id,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);
    }
}
