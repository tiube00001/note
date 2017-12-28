### CentOS7,php扩展编译

    1.安装工具，yum install m4 autoconf
    2.cd /php-source-code/ext/your-extension-dir
    3.phpize(前提是php\bin设置了环境变量)
    4../configure --with-php-config=/your-php-dir/bin/php-config
       (./configure --with-php-config=/usr/local/php7/bin/php-config)