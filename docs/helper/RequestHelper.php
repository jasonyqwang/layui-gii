<?php
/**
 * Created by PhpStorm.
 * User: jason
 * 请求
 */

namespace app\core\helpers;

use Yii;

class RequestHelper
{
    /**
     * @return \yii\console\Request|\yii\web\Request
     */
    public static function instance(){
        return Yii::$app->request;
    }

    /**
     * 获取 get数据
     * @param $name
     * @param string $default
     * @return mixed|null
     */
    public static function get($name = null, $default = ''){
        return self::param($name, 'get', $default);
    }

    /**
     * 获取 post数据
     * @param $name
     * @param string $default
     * @return mixed|null
     */
    public static function post($name = null, $default = ''){
        return self::param($name, 'post', $default);
    }

    /**
     * 获取 header 数据
     * @param $name
     * @param string $default
     * @return mixed|null
     */
    public static function header($name = null, $default = ''){
        return self::param($name, 'header', $default);
    }

    /**
     * 根据请求方式获取请求参数
     * @param $name
     * @param $requestMethod
     * @param string $default
     * @return array|mixed|string
     */
    private static function param($name, $requestMethod, $default = '') {
        switch (strtolower($requestMethod)) {
            case 'get':
                if($name){
                    $paramVal = Yii::$app->request->get($name, $default);
                }else{
                    $paramVal = Yii::$app->request->get();
                }
                break;
            case 'post':
                if($name){
                    $paramVal = Yii::$app->request->post($name, $default);
                }else{
                    $paramVal = Yii::$app->request->post();
                }
                break;
            case 'header':
                if($name){
                    $paramVal = Yii::$app->request->headers->get($name, $default);
                }else{
                    //$paramVal = Yii::$app->request->headers->toArray();
                    //获取所有的 header 参数
                    $paramVal = [];
                    foreach ($_SERVER as $name => $value) {
                        if (substr($name, 0, 5) == 'HTTP_') {
                            $paramVal[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
                        }
                    }
                    return $paramVal;
                }
                break;
            default:
                if($name){
                    $paramVal = Yii::$app->request->get($name, $default);
                }else{
                    $paramVal = Yii::$app->request->get();
                }
                break;
        }
        return $paramVal;
    }
}