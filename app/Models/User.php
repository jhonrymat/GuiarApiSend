<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'external_id',
        'external_api',
        'email_verified_at',
        'profile_photo_path'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function adminlte_image()
    {
        if (auth()->user()->external_id) {
            $foto = auth()->user()->profile_photo_url;

            // Verificar si la URL tiene el prefijo '/storage/'
            if (Str::startsWith($foto, 'http://localhost/storage/')) {
                // Si tiene el prefijo, quitarlo y devolver la URL sin modificar
                return str_replace('http://localhost/storage/', '', $foto);
            }
            return $foto;

        } else {
            if (auth()->user()->profile_photo_url != null) {
                $foto = auth()->user()->profile_photo_url;
                return $foto;
            } else {
                return 'https://picsum.photos/200';
            }
        }
        // return 'https://picsum.photos/200';
    }

    public function adminlte_desc()
    {
        return 'Administrador';
    }

    public function adminlte_profile_url(){
        return 'user/profile/';
    }

    public function subscriptions(){
        return $this->hasMany(Subscription::class);
    }

    public function getLastSubscriptionAttribute(){
        return $this->subscriptions()->orderBy('created_at', 'desc')->first();
    }

    //Accessors
    public function getIsPlanAttribute(){
        $subscription = $this->lastSubscription;

        if(!$subscription){
            return false;
        }
        return $subscription->finish_at >= Carbon::now();
    }
}
