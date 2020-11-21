<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;


class AuthorisationController extends Controller
{
    public function register(Request $request)
    {

        $request->validate(
            [
                'name' => ['required', 'string', 'min:10', 'max:50'],
                'email' => ['required', 'email'],
                'password' => ['required', 'min:6', 'max:25', 'confirmed']
            ]
        );

        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password)
        ]);

        return redirect()->route('login');
    }

    public function login(Request $request)
    {
        $user = User::where('email', $request->email->first());
        if (!$user) {
            return redirect()->route('login');
        }

        Hash::check('Test Value', $request->password);
        Auth::loginUsingId($user->id);
        return redirect()->back();
    }

    public function reset(Request $request)
    {
        dd($request->all());
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
