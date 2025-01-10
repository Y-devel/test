<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;


class RegisterController extends Controller
{
    public function create(){
        var_dump(123);
        return view('admin.register');
    }
    public function store(Request $request){
       $user = User::create(
            [
                'name' => "admin",
                'email' => "admin@mail.ru",
                'password' => "123"
            ]
       );
    }
}
