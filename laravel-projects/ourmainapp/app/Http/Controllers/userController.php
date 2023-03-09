<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User; //Models perform crud oparation and relationships

class userController extends Controller
{

    public function login(Request $request) {
        $incomingFields = $request->validate([
            'loginusername' => 'required',
            'loginpassword' => 'required'
        ]);

        if(auth()->attempt(['username' => $incomingFields['loginusername'], 'password' => $incomingFields['loginpassword']])) {
            $request->session()->regenerate();
            return 'Congrates!!!';
        } else {
            return 'Sorry!!!';
        }
    }

    public function register(Request $request) {
        $incomingField = $request->validate([
            'username' => ['required', 'min:4', 'max:20', Rule::unique('users', 'username') ],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'confirmed']
        ]);

        $incomingField['password'] = bcrypt($incomingField['password']);

        User::create($incomingField); //saving database
        return 'Hello from register function';
    }
}
