<?php

namespace App\Enums\Api;

enum Status: int
{
    case Success = 0;

    case Error = 1;

    case Unauthorized = 401;
}
