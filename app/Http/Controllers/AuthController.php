<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{   
    public function storeUser(Request $request){
        $validated = $request->validate([
            'username' => 'required|min:3|max:255|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6|max:255|'
        ]);
        $user = User::create($validated);
        auth()->login($user);
        return redirect()->route('task.index')->with('success','Usuário criado com sucesso');
    }
    public function authenticate(Request $request){
        if(auth()->attempt($request->only('email','password'))){
            $request->session()->regenerate();
            return redirect()->route('task.index')->with('success','Login efetuado com sucesso');
        };
        return back()->withErrors([
            'email' => 'Usuário ou senha inválidos',
        ]);
    }
    public function login()
    {
        return view("auth.login");
    }
    public function register()
    {
        return view("auth.register");
    }
    public function logout(){
        auth()->logout();
        return redirect()->route('task.index')->with('success','Logout efetuado com sucesso');
    }
}
