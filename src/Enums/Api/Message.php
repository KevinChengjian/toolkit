<?php

namespace App\Enums\Api;

use BenSampo\Enum\Enum;

/**
 * Class Message
 * @package Kevin\Basic\Enums\Api
 */
final class Message extends Enum
{
    const Success = '操作成功';

    const Error = '操作失败';

    const InvalidParameter = '无效参数';

    const NoPermissions = '暂无权限';
}
