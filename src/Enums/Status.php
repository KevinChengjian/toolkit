<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Enable()
 * @method static static Disable()
 */
final class Status extends Enum
{
    /**
     * Enable / Yes
     */
    const Enable = 1;

    /**
     * Disable / No
     */
    const Disable = 2;

    /**
     * @param string $status
     * @return int
     */
    public static function formatYesOrNo($status = 'Y'): int
    {
        return $status == 'Y' ? self::Enable : self::Disable;
    }
}
