<?php

namespace App\Http\Requests\System;

use App\Http\Requests\AbstractRequest;

/**
 * Class LoginRequest
 * @package App\Http\Requests
 */
class LoginRequest extends AbstractRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'username' => 'required',
            'password' => 'required',
            'verify_code' => ['sometimes', 'nullable']
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'username.required' => '请填写登录账号',
            'password.required' => '请填写登录密码',
        ];
    }
}
