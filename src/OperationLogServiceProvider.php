<?php

namespace Oreo\OperationLog;

use Dcat\Admin\Extend\ServiceProvider;
use Dcat\Admin\Admin;
use Oreo\OperationLog\Http\Middleware\LogOperation;

class OperationLogServiceProvider extends ServiceProvider
{
    // 注册中间键
    protected $middleware = [
        'middle' => [
            LogOperation::class,
        ],
    ];

    // 定义菜单
    protected $menu = [
        [
            'title' => 'Operation Log',
            'uri' => 'auth/operation-logs',
            'icon' => '',
        ]
    ];

    public function settingForm()
    {
        return new Setting($this);
    }
}
