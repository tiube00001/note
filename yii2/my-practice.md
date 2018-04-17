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

### 2017-12-13

array_map()这些函数，其实性能不及foreach,

simplexml_load_file()在加载不标准的xml文件时，会报错I/O错误，尤其是linux系统下，
使用：file_get_content()，再迂回使用，simplexml_load_string()，可以规避此错误

vue.js下，this.a['b'] = 'value'，无法触发dom更新，需使用：this.a.b = 'value'。

如果key是动态的需使用：this.$set()方法

注意点：this.a['b'] = 'value'; this.$set(this.a, 'b', 'value'); 这样连续的句会造成this.$set()失效……

### 2018-02-01

商品表的设计要点：
商城类订单表设计要点：订单本身使用一个表，订单关联的商品信息一个表：存入出售时，商品的价格，名称等数据

### 2018-04-17

yii2 action--model职能结构

action 获取数据，初步整理，调用model实现业务，返回结果
一个action表示一个业务，一个业务对应一个业务model

业务model中，数据检查与业务逻辑分离成不同方法，方便灵活调用
业务model，需要调用表model进行数据持久
而表model中，使用 “场景” 来区分业务model可操作的字段
