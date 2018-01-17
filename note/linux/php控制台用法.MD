### php的控制台用法
首先在command line下，php -h或者php --help可以显示出支持的命令参数：

    1.-a，打开一个交互式shell，像mysql客户端一样的东西
        需要模块：readline，
        安装readline的依赖包：libedit-devel，（centos）
    2.-c <path|file>，在此目录或者文件，查找php.ini文件
    3.-n，不使用配置文件运行
    4.-d foo[=bar]，定义一个ini的配置项目：foo，并根据情况赋值
    5.-e，为：debugger/profiler创建扩展信息
    6.-f file，解析并运行php文件
    7.-h，显示帮助信息
    8.-i，显示完整的php信息，类型 phpinfo()的作用
    9.-l，只检查语法
    10.-m，显示php加载的模块
    11.-r <code>，忽略<?php定界符，直接执行php代码
    12.-B <begin_code>，先执行<begin_code>，在执行输入的代码
    13.-R <code>，每一行输入的代码，执行前，都先执行<code>
    14.-E
    15.-F
    16.-H
    17.-t
    18.-s，输出html语法高亮的源码
    19.-v，显示php版本
    20.-w，输出源码，且去掉注释和空格
    21.-z <file>，加载zend扩展
    22.args……，给脚本传递参数，第一个参数使用 - 或者脚本是从标准输入中读入时，使用 -- args这种格式
    23.--ini，显示配置文件信息
    24.--rf
    25.--rc
    26.--re
    27.--rz
    28.--ri