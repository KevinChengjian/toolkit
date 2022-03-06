<?php

namespace App\Http\Controllers\System;

use App\Enums\Status;
use App\Models\SystemPermission;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Annotations\PermissionAnnotations;
use Illuminate\Support\Facades\DB;

/**
 * @PermissionAnnotations(name="权限管理")
 * Class PermissionController
 * @package App\Http\Controllers\System
 */
class PermissionController extends BasicController
{
    /**
     * Display a listing of the resource.
     *
     * @PermissionAnnotations(name="查看", type="A")
     * @return JsonResponse
     */
    public function index()
    {
        $list = SystemPermission::query()
            ->where('status', Status::Enable)
            ->orderByDesc('sorting')
            ->orderByDesc('id')
            ->get(['id', 'type', 'pid', 'name', 'describe', 'icon', 'router', 'component', 'sorting', 'status']);

        return $this->success($list);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @PermissionAnnotations(name="添加|编辑", type="A")
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $params = $request->only(['type', 'name', 'describe', 'icon', 'router', 'component', 'sorting', 'status']);
        $params['pid'] = $request->input('pid') ?? 0;

        if (!empty($params['pid'])) {
            $parent = SystemPermission::query()->where('id', $params['pid'])->first();
            if (is_null($parent)) return $this->error('无效父级权限');

            if (!empty($request->id) && in_array($request->id, explode(',', $parent->path))) {
                return $this->error('父级权限不能迁移子级权限');
            }

            $params['path'] = sprintf('%s,%s', $parent->path, $parent->id);
        }

        try {
            DB::transaction(function () use ($params, $request) {
                if (!SystemPermission::updateOrCreateById($params, $request->id)) {
                    throw new \Exception('保存权限失败');
                }

                if (!empty($request->id)) {
                    $child = SystemPermission::query()->whereRaw('find_in_set(' . $request->id . ', path)')->get();
                    foreach ($child as $item) {


                    }
                }
            }, 2);
            return $this->success();
        } catch (\Exception $exception) {
        }
        return $this->error();
    }

    /**
     * query where all
     *
     * @PermissionAnnotations(name="全部", type="A", status="N")
     * @param Request $request
     * @return JsonResponse
     */
    public function all(Request $request)
    {

    }
}
