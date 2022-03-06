<?php

namespace App\Enums;


enum PmType: int
{
    /**
     * 菜单
     */
    case Menu = 1;

    /**
     * 按钮
     */
    case Action = 2;
}
