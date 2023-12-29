<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $userGoogle = Socialite::driver('google')->user();
        // Buscar al usuario por el correo electrónico
        $userExists = User::where('email', $userGoogle->email)->first();

        if ($userExists) {
            // El usuario ya existe, maneja la lógica aquí si es necesario
            if(!$userExists->external_id){
                $userExists->external_id            = $userGoogle->id;
                $userExists->external_api         = 'google';
                $userExists->profile_photo_path   = $userGoogle->avatar;
                $userExists->save();
            }
            Auth::login($userExists);
        } else {
            // Crear un nuevo usuario si no existe
            $userNew = User::create([
                'name' => $userGoogle->name,
                'email' => $userGoogle->email,
                'profile_photo_path' => $userGoogle->avatar,
                'external_id' => $userGoogle->id,
                'email_verified_at' => Carbon::now(),
                'external_api' => 'google',
            ]);

            Auth::login($userNew);
        }

        return redirect('/dashboard');
    }

    public function redirectFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callbackFacebook()
    {
        $userFacebook = Socialite::driver('facebook')->user();

        // Buscar al usuario por el correo electrónico
        $userExists = User::where('email', $userFacebook->email)->first();

        if ($userExists) {
            // El usuario ya existe, maneja la lógica aquí si es necesario
            Auth::login($userExists);
        } else {
            // Crear un nuevo usuario si no existe
            $userNew = User::create([
                'name' => $userFacebook->name,
                'email' => $userFacebook->email,
                'profile_photo_path' => $userFacebook->avatar,
                'external_id' => $userFacebook->id,
                'email_verified_at' => Carbon::now(),
                'external_api' => 'facebook',
            ]);

            Auth::login($userNew);
        }

        return redirect('/dashboard');
    }
}
