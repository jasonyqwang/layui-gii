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
}