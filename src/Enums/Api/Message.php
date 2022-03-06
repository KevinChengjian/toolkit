<?php

namespace App\Enums\Api;

enum Message: string
{
    case Success = '操作成功';

    case Error = '操作失败';

    case InvalidParameter = '无效参数';

    case NoPermissions = '暂无权限';
}
