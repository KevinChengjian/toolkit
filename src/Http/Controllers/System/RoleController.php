<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Annotations\PermissionAnnotations;
use App\Http\Controllers\System\BasicController;

/**
 * @PermissionAnnotations(name="角色管理")
 * Class RoleController
 * @package App\Http\Controllers\System
 */
class RoleController extends BasicController
{
    /**
     * Display a listing of the resource.
     *
     * @PermissionAnnotations(name="查看", type="A")
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @PermissionAnnotations(name="添加|编辑", type="A")
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request): JsonResponse
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @PermissionAnnotations(name="删除", type="A")
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request): JsonResponse
    {

    }

    /**
     * query where all
     *
     * @PermissionAnnotations(name="全部", type="A", status="N")
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function all(Request $request): JsonResponse
    {

    }
}
