<?php

namespace App\Enums\Api;

enum AuthGuard: string
{
    case System = 'system';

    const Client = 'client';
}
