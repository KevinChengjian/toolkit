<?php

namespace App\Enums\Api;

use BenSampo\Enum\Enum;

/**
 * @method static static Success ()
 * @method static static Error()
 * @method static static Unauthorized()
 */
final class Status extends Enum
{
    const Success = 0;

    const Error = 1;

    const Unauthorized = 2;
}
