<?php
/**
 * Created by PhpStorm.
 * User: yanghailong
 * Date: 2018/3/22 0022
 * Time: 13:14
 *
 * 建造者模式：定义了处理其他对象的复杂构建的对象设计
 */

class A {
    protected $one;
    protected $two;

    public function setOne($one)
    {
        $this->one = $one;
    }

    public function setTwo($two)
    {
        $this->two = $two;
    }
}

class B {
    protected $one;
    protected $two;

    public function __construct($one, $two)
    {
        $this->one = $one;
        $this->two = $two;
    }
}


//构建class A的对象
$a = new A();
$a->setOne('one');
$a->setTwo('two');
//构建class B的对象
$b = new B('one', 'two');

//两种方法都存在同一问题：当在很多很多地方创建实例后，如果因为其他问题，必须对类A和B做出修改，
//那么就是一个巨大的问题了。

//解决此类问题的方法就是：建造者模式，以类A为例，
class BuilderForA
{
    protected $_a;
    protected $_config;

    public function __construct(array $config)
    {
        $this->_a = new A();
        $this->_config = $config;
    }

    public function buildA()
    {
        $this->_a->setOne($this->_config['one']);
        $this->_a->setTwo($this->_config['two']);

        return $this->_a;
    }
}

$builder = new BuilderForA(['one' => 'one', 'two' => 'two']);
$a = $builder->buildA();

//此时：无论class A在多少个地方被实例化过，修改A的工作量则降低很多
//由于示例简单，此问题看似有很多中解决方法，但当复杂度达到一定程度后，建造者模式是最佳选择


/**
 * 从建造者模式中来看，定义一个类的最佳方法是：
 */


class Best
{
    protected $one;
    protected $two;

    public function __construct(array $config)
    {
        foreach ($config as $key => $value) {
            if (property_exists(self::class, $key)) {
                $this->$key = $value;
            }
        }

    }
}