<?php

namespace App\Models;


use App\Traits\BasicModelTrait;
use Laravel\Sanctum\PersonalAccessToken as BaseToken;

/**
 * Class PersonalAccessToken
 * @package App\Models
 */
class PersonalAccessToken extends BaseToken
{
    use BasicModelTrait;

    /**
     * @param string $token
     * @return \App\Models\PersonalAccessToken|null
     */
    public static function findToken($token)
    {
        try {
            $token = base64_decode($token);
        } catch (\Exception $exception) {
            return null;
        }

        if (strpos($token, '|') === false) {
            return static::where('token', hash('sha256', $token))->first();
        }

        [$id, $token] = explode('|', $token, 2);

        if ($instance = static::find($id)) {
            return hash_equals($instance->token, hash('sha256', $token)) ? $instance : null;
        }
    }
}
