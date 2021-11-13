<?php


namespace Kevinchengjian\Toolkit\Tools;


class Paginate
{
    /**
     * 格式化分页数据
     *
     * @param $paginator
     * @return array
     */
    public static function format($paginator): array
    {
        return [
            'list' => $paginator->items(),
            'paging' => [
                'page' => (int)$paginator->currentPage(),
                'total' => (int)$paginator->total(),
                'size' => (int)$paginator->perPage()
            ]
        ];
    }
}
