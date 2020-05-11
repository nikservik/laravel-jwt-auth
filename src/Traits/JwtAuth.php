<?php 

namespace Nikservik\LaravelJwtAuth\Traits;

use Illuminate\Support\Facades\Mail;
use Nikservik\LaravelJwtAuth\Mail\PasswordReset;

trait JwtAuth
{
    public static $roles = [
        self::ROLE_USER,
        self::ROLE_EDITOR,
        self::ROLE_ADMIN,
        self::ROLE_SUPERADMIN,
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function sendPasswordResetNotification($token)
    {
        Mail::to($this->email)->queue(new PasswordReset($this, $token));
    }    
}