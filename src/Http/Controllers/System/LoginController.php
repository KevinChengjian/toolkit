<?php

namespace App\Http\Controllers\System;

use App\Enums\Api\AuthGuard;
use App\Http\Requests\System\LoginRequest;
use App\Models\SystemUser;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

/**
 * Class LoginController
 * @package App\Http\Controllers\System
 */
class LoginController extends BasicController
{
    /**
     * @var string[]
     */
    public $except = ['login'];

    /**
     * @param \App\Http\Requests\System\LoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request): JsonResponse
    {
        $user = SystemUser::query()->where($request->only(['username']))->first();
        if (is_null($user)) return $this->error('登录账号错误');

        if (!Hash::check($request->input('password'), $user->password)) {
            return $this->error('登录密码错误');
        }

        $token = $user->createToken(AuthGuard::System)->plainTextToken;
        return $this->success(['token' => sprintf('Bearer %s', base64_encode($token))]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(): JsonResponse
    {
        $this->user && $this->user->tokens()->delete();
        return $this->notice(true, '退出成功');
    }
}
