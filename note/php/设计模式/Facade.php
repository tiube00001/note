<?php
/**
 * Created by PhpStorm.
 * User: yanghailong
 * Date: 2018/3/26 0026
 * Time: 12:46
 *
 * 外观模式：通过在必须的逻辑和方法前创建简单的外观接口，外观模式隐藏了来自调用对象的复杂性
 *
 *
 */


class One
{
    public $one;

    public function __construct(array $one)
    {
        $this->one = $one;
    }
}

class Tool
{
    public static function implodeArrToString($arr)
    {
        return implode(',', $arr);
    }

    public static function upperCase($str)
    {
        return strtoupper($str);
    }
}


//原始业务
$one = new One(['aaa', 'bbb', 'CCccc']);

$one->one = Tool::implodeArrToString($one->one);
$one->one = Tool::upperCase($one->one);

echo $one->one;


//外观模式的实现

class Facade
{
    public static function dealAll(One $one)
    {
        $one->one = Tool::implodeArrToString($one->one);
        $one->one = Tool::upperCase($one->one);
        echo $one->one;
    }
}

$one = new One(['aaa', 'bbb', 'CCccc']);
Facade::dealAll($one);


//目的：对调用者隐藏复杂处理逻辑，提供一个：简单的功能接口

