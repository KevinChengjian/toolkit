<?php

namespace App\Traits;

use App\Enums\Api\Message;
use Kevinchengjian\Toolkit\Tools\Paginate;
use Illuminate\Http\JsonResponse;
use Kevinchengjian\Toolkit\Tools\HttpResponse;

/**
 * Trait ResponseTrait
 * @package Kevin\Basic\Traits
 */
trait ResponseTrait
{
    /**
     * @param mixed|null $data
     * @param string|Message $msg
     * @param array $option
     * @return JsonResponse
     */
    public function success(mixed $data = null, string|Message $msg = Message::Success, array $option = []): JsonResponse
    {
        return HttpResponse::success($data, $msg, $option);
    }

    /**
     * @param string|Message $msg
     * @param null $data
     * @param array $option
     * @return JsonResponse
     */
    public function error(string|Message $msg = Message::Error, $data = null, array $option = []): JsonResponse
    {
        return HttpResponse::error($msg, $data, $option);
    }

    /**
     * @param bool $isSuccess
     * @param mixed $msg
     * @return JsonResponse
     */
    public function notice(bool $isSuccess = true, $msg = null): JsonResponse
    {
        return $isSuccess
            ? HttpResponse::notice($msg ?: Message::Success)
            : HttpResponse::result($msg ?: Message::Error);
    }

    /**
     * @param $list
     * @return JsonResponse
     */
    public function paginate($list): JsonResponse
    {
        return HttpResponse::success(Paginate::format($list));
    }
}
