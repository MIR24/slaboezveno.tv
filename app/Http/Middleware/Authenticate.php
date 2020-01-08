<?php

namespace App\Http\Middleware;

use App\Entity\User;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param \Illuminate\Http\Request $request
     * @return string
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            $uuid = Str::uuid();
            $user = new User();
            $user->name = $uuid;
            $user->password = Hash::make($uuid);
            $user->email = 'user' . $uuid . '@slaboezveno.mir24.tv';
            $user->save();

            Auth::login($user);

            return route("selection.getQuestion");
        }
    }
}
