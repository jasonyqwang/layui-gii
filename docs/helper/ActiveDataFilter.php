<?php
/**
 * Created by PhpStorm.
 * @author  jason <jasonwang1211@gmail.com>
 */

namespace app\core\filters;


class ActiveDataFilter extends \yii\data\ActiveDataFilter
{
    //过滤提交过来的数据
    public $filterAttributeName = 'filter';

    //每种方法支持查询的类型
    public $operatorTypes = [
        '<' => [self::TYPE_STRING, self::TYPE_INTEGER, self::TYPE_FLOAT, self::TYPE_DATETIME, self::TYPE_DATE, self::TYPE_TIME],
        '>' => [self::TYPE_STRING, self::TYPE_INTEGER, self::TYPE_FLOAT, self::TYPE_DATETIME, self::TYPE_DATE, self::TYPE_TIME],
        '<=' => [self::TYPE_STRING, self::TYPE_INTEGER, self::TYPE_FLOAT, self::TYPE_DATETIME, self::TYPE_DATE, self::TYPE_TIME],
        '>=' => [self::TYPE_STRING, self::TYPE_INTEGER, self::TYPE_FLOAT, self::TYPE_DATETIME, self::TYPE_DATE, self::TYPE_TIME],
        '=' => '*',
        '!=' => '*',
        'IN' => '*',
        'NOT IN' => '*',
        'LIKE' => [self::TYPE_STRING, self::TYPE_INTEGER],
    ];
}