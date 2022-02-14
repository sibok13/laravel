<?php

declare(srtict_types=1);

namespace App\Services;
use App\Contracts\Social;
use App\Models\User as ModelsUser;
use Exception;
use Laravel\Socialite\Contracts\User;
use App\Models\User as LocalUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SocialService implements Social
{

    public function setUser(User $socialUser, string $network): string
    {
        if(is_null(ModelsUser::query()->where('email', $socialUser->getEmail())->first())) {

            $newUser = ['name' => $socialUser->getName(), 'email' => $socialUser->getEmail(), 'is_admin' => 0] + [
                'password' => Hash::make(12345678)];
            
            LocalUser::create($newUser);
        } 

        $user = ModelsUser::query()->where('email', $socialUser->getEmail())->first();

            if($user){
                $user->name = $socialUser->getName();

                if($user->save()) {
                    Auth::loginUsingId($user->id);
                    return route('account');
                }
            }

            throw new Exception("Проблема с авторизацией по сети " . $network);
    } 
}