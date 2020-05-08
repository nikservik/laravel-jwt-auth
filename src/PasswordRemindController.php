<?php

namespace Nikservik\LaravelJwtAuth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use Nikservik\LaravelJwtAuth\Requests\AuthNewPasswordRequest;
use Nikservik\LaravelJwtAuth\Requests\AuthRemindRequest;

class PasswordRemindController extends Controller
{
    public static function apiRoutes() 
    {
        Route::prefix('api/auth')->namespace('Nikservik\LaravelJwtAuth')->group(function () {
            Route::post('remind', 'PasswordRemindController@remind');
            Route::post('checkToken', 'PasswordRemindController@checkToken');
            Route::post('newPassword', 'PasswordRemindController@newPassword');
        });
    }

    public function __construct()
    {
        $this->middleware(['api']);
    }

    public function remind(AuthRemindRequest $request)
    {
        $response = Password::broker()->sendResetLink($request->only('email'));
        if ($response == Password::RESET_LINK_SENT)
            return [
                'status' => 'success', 
            ];
        else
            return [ 
                'status' => 'error', 
                'errors' => [ 'email' => $response ]
            ];
    }

    public function checkToken(Request $request)
    {
        if (! $request->has('token') or ! $request->has('email'))
            return response()->json([
                'status' => 'error',
                'errors' => [ 'token' => 'email' ],
            ], 403);

        if (is_null($user = Password::broker()->getUser($request->only('email'))))
            return response()->json([
                'status' => 'error',
                'errors' => [ 'token' => 'email' ],
            ], 403);

        if (! Password::broker()->tokenExists($user, $request->token))
            return response()->json([
                'status' => 'error',
                'errors' => [ 'token' => 'token' ],
            ], 403);

        return response()->json(['status' => 'success']);
    }

    public function newPassword(AuthNewPasswordRequest $request)
    {
        $response = Password::broker()->reset(
            $request->only(
                'email', 'password', 'password_confirmation', 'token'
            ), function ($user, $password) {
                $user->password = Hash::make($password);
                $user->save();
                event(new PasswordReset($user));
            }
        );
        if ($response == Password::PASSWORD_RESET) {
            return response()->json([
                'status' => 'success',
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'errors' => [ 'password' => $response ]
            ]);
        }
    }
}
