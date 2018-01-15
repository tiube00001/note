### centOs7

    0.创建用户组：
        groupadd nginx
        useradd nginx -M -s /sbin/nologin -g nginx nginx
        
    1.yum install gcc gcc-c++
    2. yum -y install zlib zlib-devel openssl openssl--devel pcre pcre-devel
    3.下载zlib源码包，下载至/download，解压有：/download/zlib-1.2.11
    4../configure \
          --prefix=/usr/local/nginx \
          --user=nginx \
          --group=nginx \
          --with-http_ssl_module \
          --with-pcre \
          --with-zlib=/download/zlib-1.2.11 \
    5.make && make install
    6.指定nginx启动配置文件
    7.书写启动脚本
    8.添加开机启动
    9.nginx增加虚拟机：
        在nginx.conf http{}块最后一行添加：
        include vhosts/*.conf;
        在……/vhosts目录添加server配置文件
    