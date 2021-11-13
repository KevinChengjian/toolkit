<?php

namespace App\Annotations;

use Doctrine\Common\Annotations\Annotation\Enum;
use Doctrine\Common\Annotations\Annotation\NamedArgumentConstructor;

/**
 * 权限注解类
 *
 * @Annotation
 */
final class PermissionAnnotations extends NamedArgumentConstructor
{
    /**
     * name
     *
     * @var string
     */
    public $name;

    /**
     * permission describe
     *
     * @var string
     */
    public $describe = '';

    /**
     * type menu or action
     *
     * @Enum({"M", "A"})
     */
    public $type = 'M';

    /**
     * permission status
     * show or disable
     *
     * @Enum({"Y", "N"})
     */
    public $status = 'Y';

    /**
     * router
     *
     * @var string
     */
    public $router;

    /**
     * action
     *
     * @var string
     */
    public $action;

    /**
     * permission icon
     *
     * @var string
     */
    public $icon = '';
}
