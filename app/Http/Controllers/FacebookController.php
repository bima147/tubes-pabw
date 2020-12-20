<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Socialite;
use App\User;

class FacebookController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }
 
    public function callback()
    {
 
        // jika user masih login lempar ke home
        if (Auth::check()) {
            return redirect('/home');
        }
 
        $oauthUser = Socialite::driver('facebook')->user();
        $user = User::where('email', $oauthUser->email)->first();
        $facebook_user = User::where('google_id', $oauthUser->id)->first();
        if ($user) {
            if ($facebook_user) {
                Auth::loginUsingId($user->id);
            } else {
                $updateUser = User::where('id', $user->id)->update([
                    'facebook_id'=> $oauthUser->id,
                ]);
                Auth::loginUsingId($user->id);
            }            
            return redirect('/');
        } else {
            $newUser = User::create([
                'name' => $oauthUser->name,
                'email' => $oauthUser->email,
                'facebook_id'=> $oauthUser->id,
                // password tidak akan digunakan ;)
                'password' => md5($oauthUser->token),
            ]);
            Auth::login($newUser);
            return redirect('/');
        }
    }
}
