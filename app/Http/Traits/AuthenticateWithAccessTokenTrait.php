<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;
trait AuthenticateWithAccessTokenTrait
{
    protected function authWithAccessToken(Request $request): bool
    {
        if ($request->has('access_token')) {
            $token = PersonalAccessToken::findToken($request->input('access_token'));
            if ($token) {
                $userId = $token->tokenable_id;
                // TODO Verificar rol del usuario (super-admin)
                if ($userId) {
                    return true;
                }
            }
        }

        return false;
    }
}