<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Menu()
 * @method static static Action()
 */
final class PmType extends Enum
{
    /**
     * 菜单
     */
    const Menu = 1;

    /**
     * 按钮
     */
    const Action = 2;

    /**
     * @param string $type
     * @return int
     */
    public static function format(string $type = 'M'): int
    {
        return $type == 'M' ? self::Menu : self::Action;
    }
}
