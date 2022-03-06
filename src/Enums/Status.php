<?php

namespace App\Enums;

enum Status: int
{
    /**
     * Enable / Yes
     */
    case Enable = 1;

    /**
     * Disable / No
     */
    case Disable = 2;
}
