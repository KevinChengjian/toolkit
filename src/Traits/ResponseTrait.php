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
     * @param mixed $data
     * @param string $msg
     * @param array $option
     * @return \Illuminate\Http\JsonResponse
     */
    public function success($data = null, $msg = Message::Success, $option = []): JsonResponse
    {
        return HttpResponse::success($data, $msg, $option);
    }

    /**
     * @param string $msg
     * @param null $data
     * @param array $option
     * @return \Illuminate\Http\JsonResponse
     */
    public function error($msg = Message::Error, $data = null, $option = []): JsonResponse
    {
        return HttpResponse::error($msg, $data, $option);
    }

    /**
     * @param bool $isSuccess
     * @param mixed $msg
     * @return \Illuminate\Http\JsonResponse
     */
    public function notice($isSuccess = true, $msg = null): JsonResponse
    {
        return $isSuccess
            ? HttpResponse::notice($msg ?: Message::Success)
            : HttpResponse::result($msg ?: Message::Error);
    }

    /**
     * @param $list
     * @return \Illuminate\Http\JsonResponse
     */
    public function paginate($list): JsonResponse
    {
        return HttpResponse::success(Paginate::format($list));
    }
}
