<?php

namespace Kevinchengjian\Toolkit\Enums;

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
}
