<?php

namespace App;

use App\Notifications\WelcomeNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use MyCustomWelcomeNotification;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    use HasPermissions;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendWelcomeNotification(\Carbon\Carbon $validUntil)
    {
        $this->notify(new WelcomeNotification());
    }
    
}
