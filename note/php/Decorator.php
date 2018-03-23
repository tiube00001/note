<?php
/**
 * Created by PhpStorm.
 * User: yanghailong
 * Date: 2018/3/23 0023
 * Time: 12:39
 *
 * 装饰器设计模式：当已有对象的部分内容或功能发生变化，但不需要修改原始对象的结构，
 * 那么使用装饰器设计模式最合适
 *
 * 适用场景：类的变化是快速，细小的。而且几乎不影响应用程序的其他部分
 *
 * 目标：不必重写现有的任何代码，而且是对某个对象进行功能进行功能增量
 *
 * 特点：不修改以前的任何代码，就可以增加以前的类的功能
 *
 * 优点：此类需求同理可以使用：适配器模式完成业务，通过继承扩展新的功能，但是由于PHP只允许单继承，
 *
 *      过多的继承扩展，将导致继承关系混乱，且难以维护。因此使用装饰器模式，可以有效的控制类继承的层数
 *
 */


class Base
{
    protected $string;

    public function setString($one)
    {
        $this->string = $one;
    }

    public function echoString()
    {
        echo $this->string.PHP_EOL;
    }
}


class DecoratorForBase
{
    /**
     * @var Base $_base;
     */
    protected $_base;
    public function __construct($baseObj)
    {
        $this->_base = $baseObj;
    }

    public function setJsonFromArr(array $arr)
    {
        $jsonString = json_encode($arr, JSON_UNESCAPED_UNICODE);
        $this->_base->setString($jsonString);
    }
}

$baseObj = new Base();
$baseObj->setString('test');
$baseObj->echoString();

$decorator = new DecoratorForBase($baseObj);
$decorator->setJsonFromArr(['one' => 'test']);
$baseObj->echoString();
