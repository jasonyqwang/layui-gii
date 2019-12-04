# 开发 Yiii2 的扩展包

## 1.初始化 composer 配置

```json

{
    "name": "jsyqw/layui-gii",
    "description": "基于Yii2矿框架，通过gii生成layui布局",
    "type": "yii2-extension",
    "authors": [
        {
            "name": "Jason Wang",
            "email": "1045643440@qq.com"
        }
    ],
    "require": {},
    "autoload": {
        "psr-4": {
            "Jsyqw\\Layuigii\\": "src/"
        }
    }
}


```

## 2.配置最外层的composer.json
   
```json
    {
       "autoload": {
              "psr-4": {
                  "Jsyqw\\Layuigii\\": "vendor/layui-gii/src/"
              }
       }
    }
```

## 3.运行：composer dumpautoload

```bash
> composer dumpautoload
> Generated autoload files containing 543 classes
```

对应的 autoload_psr4.php
会多一条信息
'Jsyqw\\Layuigii\\' => array($vendorDir . '/layui-gii/src'),

eg：
```php
    ...
    'Jsyqw\\Utils\\' => array($vendorDir . '/jsyqw/utils/src'),
    'Jsyqw\\Ret\\' => array($vendorDir . '/jsyqw/results/src'),
    'Jsyqw\\Layuigii\\' => array($baseDir . '/layui-gii/src'),
    'JmesPath\\' => array($vendorDir . '/mtdowling/jmespath.php/src'),
    'GuzzleHttp\\Psr7\\' => array($vendorDir . '/guzzlehttp/psr7/src'),
    ...
```



