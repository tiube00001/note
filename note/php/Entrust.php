<?php
/**
 * Created by PhpStorm.
 * User: yanghailong
 * Date: 2018/3/23 0023
 * Time: 13:12
 *
 * 委托模式：通过分配或委托至其他对象，能够去除核心对象中的复杂性，并且动态的增加新功能，不必对原有功能业务代码做任何修改
 */



class Old
{
    public $one;
    public function setOne($one)
    {
        $this->one = $one;
    }

    public function printOne()
    {
        $type = gettype($this->one);
        if ($type == 'array' || $type == 'object') {
            print_r($this->one);
        } elseif ($type != 'NULL' || $type != 'boolean') {
            echo $this->one.PHP_EOL;
        } else {
            var_dump($this->one);
        }
    }
}



$old = new Old();
$old->setOne('aaa');
$old->printOne();


class PrintArray
{
    public function printData($data)
    {
        print_r($data);
    }
}

class PrintString
{
    public function printData($data)
    {
        echo $data.PHP_EOL;
    }
}

class PrintAll
{
    protected $one;
    /**
     * @var PrintArray|PrintString $_obj
     */
    protected $_obj;

    public function setOne($one)
    {
        $type = gettype($one);
        $className = 'Print'.ucfirst($type);
        $this->_obj = new $className();
        $this->one = $one;
    }

    public function printData()
    {
        $this->_obj->printData($this->one);
    }
}

$all = new PrintAll();

$all->setOne('one');
$all->printData();


$all->setOne(['aa' => 'bb']);
$all->printData();

/**
 * 采用了委托模式后，当项目完成上线后，却需要在原有的基础上新增功能，此时只需要增加委托处理类，
 * 就可以完成新功能的添加，而不用修改原有的 “所有” 业务逻辑
 */
