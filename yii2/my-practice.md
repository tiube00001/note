### 2017-12-01之前
Yii2-ueditor-asset会引起ActiveForm，ajax,client验证异常。必须关闭此字段的clientVlidation

Yii2 rules，onSkipEmpety优先级很高

order by field(),SQL自定义排序

搜索引擎：elasticsearch，sphinx

每天上报日志到nginx日志 然后nginx用flume打到kafka 然后kafka在到spark streaming 然后再进入mysql

ci:持续集成

cd:持续交付

svn,git钩子

### 2017-12-04
yii2 $model->select(['aaa AS \`bbb\`'])，可以生成 SELECT 'aaa' AS \`bbb\`，这类自己生造的字段

yii2\db\Expression对象，可以声明在查询构造时，原样输出字符串，不被转义

### 2017-12-05

函数：reset($array) 将数组指针倒回第一个元素

函数：next($array) 将数组指针移向下一个元素

函数：prev($array) 将数组指针向上移动一位

函数：end($array) 将数组内部指针移动到最后一位

函数：key($array) 取得数组内部指针当前指向的元素的key

函数：current($array) 取出数组指针指向的元素的value

### 2017-12-06

函数：strip_tags($text, '\<p>\<a>'); 去除字符串的html标签，但是保留p和a标签

### 2017-12-11

日志记录数据：接收的数据，validate验证失败后的错误信息，抛出的异常

### 2017-12-12

八位透明度+颜色，16进制数据：aabbggrr，aa代表透明度，bb蓝色，gg绿色，rr红色
