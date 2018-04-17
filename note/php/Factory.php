<?php
/**
 * Created by PhpStorm.
 * User: yanghailong
 * Date: 2018/3/27 0027
 * Time: 12:41
 *
 * 工厂模式：返回某个对象的新实例的接口。同时使调用代码避免确定实际实例化基类的步骤
 *
 * 优点：让对象的调用者和对象创建过程分离，当对象调用者需要对象时，直接向工厂请求即可。
 * 从而避免了对象的调用者与对象的实现类以硬编码方式耦合，以提高系统的可维护性、可扩展性。
 *
 * 缺点：当产品修改时，工厂类也要做相应的修改，比如要增加一种操作类，如求M数的N次方，就得改case,修改原有类，违背了开放-封闭原则。
 *
 */

class TestOne
{

}

class TestTwo
{

}

$type = 'One';
if ($type == 'One') {
    $obj = new TestOne();
} else {
    $obj = new TestTwo();
}


//工厂模式：

class Factory {
    public static function create($type)
    {
        $class = 'Test'.$type;
        return new $class();
    }
}

$obj = Factory::create($type);