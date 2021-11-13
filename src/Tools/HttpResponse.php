<?php

namespace Kevinchengjian\Toolkit\Tools;

use Illuminate\Http\JsonResponse;
use App\Enums\Api\Message;
use App\Enums\Api\Status;

/**
 * Class HttpResponse
 * @package Kevin\Basic\Tools
 */
class HttpResponse
{
    /**
     * @var int
     */
    private static $status = 200;

    /**
     * @var array
     */
    private static $headers = [];

    /**
     * @param $status
     */
    public static function setStatus($status)
    {
        self::$status = $status;
    }

    /**
     * @param array $headers
     */
    public static function setHeaders(array $headers)
    {
        self::$headers = $headers;
    }

    /**
     * @param int $code
     * @param string $msg
     * @param array|string|null|bool|mixed $data
     * @param array $option
     * @return JsonResponse
     */
    public static function result($code = Status::Success, string $msg = Message::Success, $data = null, array $option = []): JsonResponse
    {
        return response()->json(
            ['code' => $code, 'msg' => $msg, 'data' => $data, 'option' => $option],
            self::$status,
            self::$headers
        );
    }

    /**
     * @param mixed $data
     * @param string $msg
     * @param array $option
     * @return JsonResponse
     */
    public static function success($data = [], $msg = Message::Success, array $option = []): JsonResponse
    {
        return self::result(Status::Success, $msg, $data, $option);
    }

    /**
     * @param string $msg
     * @param null $data
     * @param array $option
     * @return JsonResponse
     */
    public static function error(string $msg = Message::Error, $data = null, $option = []): JsonResponse
    {
        return self::result(Status::Error, $msg, $data, $option);
    }

    /**
     * @param string $msg
     * @param mixed $data
     * @param array $option
     * @return JsonResponse
     */
    public static function notice($msg = Message::Success, $data = [], $option = []): JsonResponse
    {
        return self::result(Status::Success, $msg, $data, $option);
    }
}
