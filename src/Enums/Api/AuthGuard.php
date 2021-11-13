<?php

namespace App\Enums\Api;

use BenSampo\Enum\Enum;

/**
 * @method static static System()
 * @method static static Client()
 */
final class AuthGuard extends Enum
{
    const System = 'system';

    const Client = 'client';
}
