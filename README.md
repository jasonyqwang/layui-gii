# 开发 Yiii2 的扩展包

# 一.使用composer安装

## 1.安装
    
        composer require jsyqw/layui-gii
        
## 2.使用

在 Yii 的配置文件中，添加如下配置

```php
    ...
    $config['modules']['gii'] = [
            'class' => 'yii\gii\Module',
            // uncomment the following to add your IP if you are not connecting from localhost.
            //'allowedIPs' => ['127.0.0.1', '::1'],
            'generators' => [
                'crud' => [ //生成器名称
                    'class' => 'Jsyqw\Layuigii\crud\Generator',
                    'templates' => [ //设置我们自己的模板
                        //模板名 => 模板路径
                        'layuiCrud' => '@vendor/layui-gii/src/crud/default',
                    ]
                ],
                'model' => [ //生成器名称
                    'class' => 'Jsyqw\Layuigii\model\Generator',
                    'templates' => [ //设置我们自己的模板
                        //模板名 => 模板路径
                        'layuiModel' => '@vendor/layui-gii/src/model/default',
                    ]
                ]
            ],
        ];
    ...
```    


# 二.基于git引用该项目 

## 1.初始化 composer 配置

```json

{
    "name": "jsyqw/layui-gii",
    "description": "基于Yii2框架的扩展，通过gii生成layui布局",
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


## 项目配置

在 Yii 的配置文件中，添加如下配置

```php
    ...
    $config['modules']['gii'] = [
            'class' => 'yii\gii\Module',
            // uncomment the following to add your IP if you are not connecting from localhost.
            //'allowedIPs' => ['127.0.0.1', '::1'],
            'generators' => [
                'layuiCrud' => [ //生成器名称
                    'class' => 'Jsyqw\Layuigii\crud\Generator',
                    'templates' => [ //设置我们自己的模板
                        //模板名 => 模板路径
                        'layuiCrud' => '@vendor/layui-gii/src/crud/default',
                    ]
                ],
                'model' => [ //生成器名称
                    'class' => 'Jsyqw\Layuigii\model\Generator',
                    'templates' => [ //设置我们自己的模板
                        //模板名 => 模板路径
                        'layuiModel' => '@vendor/layui-gii/src/model/default',
                    ]
                ],
                'api' => [ //生成器名称
                    'class' => 'Jsyqw\Layuigii\api\Generator',
                ]
            ],
        ];
    ...
```
