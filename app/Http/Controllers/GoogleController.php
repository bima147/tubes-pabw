<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Socialite;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Str;

class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }
 
    public function callback()
    {
 
        // jika user masih login lempar ke home
        if (Auth::check()) {
            return redirect('/home');
        }
 
        $oauthUser = Socialite::driver('google')->user();
        $user = User::where('email', $oauthUser->email)->first();
        $google_user = User::where('google_id', $oauthUser->id)->first();
        if ($user) {
        	if ($google_user) {
        		Auth::loginUsingId($user->id);
        	} else {
        		$updateUser = User::where('id', $user->id)->update([
	                'google_id'=> $oauthUser->id,
	            ]);
	            Auth::loginUsingId($user->id);
        	}            
            return redirect('/');
        } else {
            $newUser = User::create([
                'name' => $oauthUser->name,
                'email' => $oauthUser->email,
                'google_id'=> $oauthUser->id,
                'email_verified_at' => Carbon::now(),
                // password tidak akan digunakan ;)
                'password' => md5($oauthUser->token),
                'remember_token' => Str::random(10),
            ]);
            Auth::login($newUser);
            return redirect('/');
        }
    }
}
