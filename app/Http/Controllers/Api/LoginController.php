<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $validated = $request->validate([
           'email' => 'required|email',
           'password' => 'required'
        ]);

        if(Auth::attempt($validated)){

            $user = User::where('email',$request->email)->first();
            return response()->json(['token' => $user->createToken('ApIToken'.$user->email)->plainTextToken,'user'=>$user],200);
        }

        return response()->json(['message' => 'Email Or password is Incorrect'],401);
    }
}
