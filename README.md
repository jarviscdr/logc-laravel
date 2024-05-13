# LogClient 日志中心客户端
当前客户端是用于适配LogC日志中心的客户端，用于快捷上报日志使用；

## 安装
```bash
composer require jarviscdr/logc-laravel
```

## 使用
```php
// 1.更新配置文件 config/logc.php

// 2.使用配套函数上报日志
logc(['err' => -1, 'data' => '订单请求异常', 'oid' => 1234567890], 'order,alipay', \Jarviscdr\LogcClient\Constant::DEBUG);

```
