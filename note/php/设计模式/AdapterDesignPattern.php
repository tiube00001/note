<?php
/**
 *
 * 适配器模式：将某个对象的接口，适配成另外一个对象期望的样子
 *
 * 应用：框架数据库抽象层，大多就是一个Adapter类的集合
 *
 * 场景：基本上，只要存在要求主平台持续稳定并且不使现有程序流程混乱的问题，在开发时，就可以使用适配器模式
 *
 * 注意：在转换一个对象的接口用于另外一个对象时，实现Adapter不仅是最佳方法，也能减少很多麻烦
 *
 * 优点：在完成新的业务需求的同时，保证了现有业务的稳定性，并且尽可能的复用了代码
 */


class Origin {
    public function doA($a)
    {
        echo $a;
    }
}

$originObj = new Origin();

$a = 'this is business a';
$originObj->doA($a);

class AdapterForOrigin extends Origin
{
    public function doB(array $b)
    {
        $a = implode(PHP_EOL, $b);
        $this->doA($a);
    }
}


$b = ['this is new business', 'this is business b'];

$adapterObj = new AdapterForOrigin();

$adapterObj->doB($b);


