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
     * @param int|Status $code
     * @param string|Message $msg
     * @param array|string|null|bool|mixed $data
     * @param array $option
     * @return JsonResponse
     */
    public static function result(Status|int $code = Status::Success, string|Message $msg = Message::Success, $data = null, array $option = []): JsonResponse
    {
        return response()->json(
            ['code' => $code, 'msg' => $msg, 'data' => $data, 'option' => $option],
            self::$status,
            self::$headers
        );
    }

    /**
     * @param array|string|null|bool|mixed $data
     * @param string|Message $msg
     * @param array $option
     * @return JsonResponse
     */
    public static function success($data = null, string|Message $msg = Message::Success, array $option = []): JsonResponse
    {
        return self::result(Status::Success, $msg, $data, $option);
    }

    /**
     * @param string|Message $msg
     * @param array|string|null|bool|mixed $data
     * @param array $option
     * @return JsonResponse
     */
    public static function error(string $msg = Message::Error, $data = null, $option = []): JsonResponse
    {
        return self::result(Status::Error, $msg, $data, $option);
    }

    /**
     * @param string|Message $msg
     * @param array|string|null|bool|mixed $data
     * @param array $option
     * @return JsonResponse
     */
    public static function notice(string|Message $msg = Message::Success, $data = [], $option = []): JsonResponse
    {
        return self::result(Status::Success, $msg, $data, $option);
    }
}
