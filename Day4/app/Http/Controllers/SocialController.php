<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    //

    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $userCredentials = Socialite::driver($provider)->user();
        $user = $this->getUser($userCredentials, $provider);
        auth()->login($user);
        return redirect()->to('/posts');
    }

    public function getUser($userCredentials, $provider)
    {
        $user = User::where('github_id', $userCredentials->id)->first() ? User::where('github_id', $userCredentials->id)->first() : User::where('email', $userCredentials->email)->first();
        if (!$user) {
            $user = User::create([
                'name' => $userCredentials->name,
                'email' => $userCredentials->email,
                // 'github_id' => $userCredentials->id,
                'password' => '12345678',
                'github_token' => $userCredentials->token,
            ]);
        }
        return $user;
    }
}