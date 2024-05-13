<?php

namespace Jarviscdr\LogcLaravel;

use Illuminate\Support\ServiceProvider;
use Jarviscdr\LogcClient\Client;

class LogcServiceProvider extends ServiceProvider
{
    /**
     * 注册服务
     *
     * @author Jarvis
     * @date   2024-05-13 22:39
     */
    public function register()
    {
        $host = config('logc.api_host', 'http://127.0.0.1:10001');
        $timeout = config('logc.api_timeout', 1.0);
        $project = config('logc.project', 'logc');
        $tags = config('logc.tags', []);
        $throwException = config('logc.throw_exception', true);

        $client = Client::getInstance()
            ->setApiClient($host, $timeout)
            ->setProject($project)
            ->setTags($tags)
            ->setThrowException($throwException);

        $this->app->instance('logc', $client);
    }

    /**
     * 引导服务
     *
     * @author Jarvis
     * @date   2024-05-13 22:40
     */
    public function boot()
    {
        // 发布配置文件
        $this->publishes([
            __DIR__.'/config/logc.php' => config_path('logc.php'),
        ]);
    }
}