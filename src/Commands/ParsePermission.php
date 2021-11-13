<?php

namespace App\Console\Commands;

use App\Annotations\PermissionAnnotations;
use App\Enums\Api\AuthGuard;
use App\Enums\PmType;
use App\Enums\Status;
use App\Models\SystemPermission;
use Doctrine\Common\Annotations\AnnotationReader;
use Illuminate\Console\Command;
use Illuminate\Routing\Router;

class ParsePermission extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse:permission {prefix?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'parse project permission';

    /**
     * @var Router
     */
    protected $router;

    /**
     * @var string
     */
    protected $annotation;

    /**
     * @var AnnotationReader
     */
    protected $reader;

    /**
     * @var array
     */
    protected $permission = [];

    /**
     * @var string
     */
    protected $prefix = AuthGuard::System;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Router $router, AnnotationReader $annotationReader)
    {
        parent::__construct();

        $this->router = $router;
        $this->reader = $annotationReader;
        $this->annotation = PermissionAnnotations::class;
    }

    /**
     * Execute the console command.
     *
     * @throws \ReflectionException
     */
    public function handle()
    {
        $this->prefix = $this->argument('prefix') ?? $this->prefix;

        $this->line('parsing project ' . $this->prefix . ' modules permissions...');


        $mapCollections = [];
        foreach ($this->router->getRoutes() as $route) {
            if ($route->getAction()['prefix'] == $this->prefix) {
                if ($route->getActionName() != 'Closure') {
                    list($controller, $method) = explode('@', $route->getActionName());
                    $mapCollections[$controller][] = $method;
                }
            }
        }

        foreach ($mapCollections as $menu => $actions) {
            $ref = new \ReflectionClass($menu);
            $menuAnn = $this->reader->getClassAnnotation($ref, $this->annotation);
            if (is_null($menuAnn)) continue;

            $menuAnn->action = $menuAnn->action ?? str_replace($ref->getNamespaceName() . DIRECTORY_SEPARATOR, '', $ref->getName());
            $this->permission[] = $this->formatColumn($menuAnn);

            $existMenu = SystemPermission::query()->where('action', $menuAnn->action)->first();
            if (is_null($existMenu)) $existMenu = SystemPermission::query()->create($this->formatColumn($menuAnn));


            $sorting = 1000;
            foreach ($actions as $key => $action) {
                $actAnn = $this->reader->getMethodAnnotation(new \ReflectionMethod($menu, $action), $this->annotation);
                if (is_null($actAnn)) continue;

                $actAnn->action = sprintf('%s@%s', $menuAnn->action, $actAnn->action ?? $action);
                $actNames = explode('|', $actAnn->name);

                foreach ($actNames as $name) {
                    $actAnn->name = $name;
                    $this->permission[] = $actionPermission = $this->formatColumn($actAnn);

                    $existAction = SystemPermission::query()->where('name', $actAnn->name)->where('action', $actAnn->action)->first();
                    if (is_null($existAction)) SystemPermission::query()->create(array_merge($actionPermission, [
                        'pid' => $existMenu->id,
                        'path' => sprintf('%s,%s', $existMenu->path, $existMenu->id),
                        'sorting' => --$sorting
                    ]));
                }
            }
        }

        $this->displayPermission($this->permission);
    }

    /**
     * format display column
     *
     * @param $params
     * @return array
     */
    public function formatColumn($params): array
    {
        return [
            'name' => $params->name,
            'type' => PmType::format($params->type),
            'action' => $params->action,
            'status' => Status::formatYesOrNo($params->status),
            'router' => $params->router,
            'describe' => $params->describe
        ];
    }

    /**
     * Display the permission information on the console
     *
     * @param array $permission
     */
    public function displayPermission(array $permission)
    {
        $this->table(['name', 'type', 'action', 'status', 'router', 'describe'], $permission);
    }
}
