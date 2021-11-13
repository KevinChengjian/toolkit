<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\AbstractController;

/**
 * Class BasicController
 * @package App\Http\Controllers\System
 */
class BasicController extends AbstractController
{
    /**
     * @var array
     */
    public $except = [];

    /**
     * @var
     */
    protected $user;

    /**
     * BasicController constructor.
     */
    public function __construct()
    {

    }
}
