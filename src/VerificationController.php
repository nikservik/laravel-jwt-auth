<?php

namespace Nikservik\LaravelJwtAuth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Nikservik\LaravelJwtAuth\Mail\VerifyEmail;
use Nikservik\LaravelJwtAuth\Requests\EmailVerifyRequest;

class VerificationController extends Controller
{

    public static function apiRoutes() 
    {
        Route::prefix('api/email')->namespace('Nikservik\LaravelJwtAuth')->group(function () {
            Route::get('resend', 'VerificationController@resend')
            ->middleware('auth:api');
            Route::post('verify', 'VerificationController@verify');
        });
    }

    public function __construct()
    {
        $this->middleware(['api']);
    }

    public function verify(EmailVerifyRequest $request)
    {
        $user = User::find($request->user);

        if ($user->hasVerifiedEmail()) 
            return [ 
                'status' => 'success', 
            ];

        if(! hash_equals((string) $request->hash, sha1($user->email)))
            return response()->json([ 
                'status' => 'error', 
                'errors' => [ 'verify' => 'badLink' ],
            ], 403);

        if ($user->markEmailAsVerified()) 
            event(new Verified($user));

        return [ 
            'status' => 'success', 
        ];
    }

    public function resend()
    {
        Mail::to(Auth::user()->email)->queue(new VerifyEmail(Auth::user()));

        return [ 'status' => 'success' ];
    }
}
