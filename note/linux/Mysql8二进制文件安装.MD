### MYSQL8Linux二进制文件安装

    1.删除自带的mysql:
    
        yum remove mysql mysql-server mysql-libs compat-mysql51
        rm -rf /var/lib/mysql
        rm /etc/my.cnf
        rpm -qa|grep mysql
      
    2.yum install libaio
    
    3.下载mysql-linux通用二进制安装文件，并解压到/usr/local/mysql(注意，路径最好不要更改，后面有用)
    
    4.cd /usr/local/mysql，初始化
        bin/mysqld --initialize --user=mysql \
        	--basedir=/usr/local/mysql \
            --datadir=/usr/local/mysql/data \
        并复制下，临时密码
            
    5.执行：bin/mysql_ssl_rsa_setup
      此项是安装ssl证书，但是必须要求数据目录为：/usr/local/mysql/data，不知道如何更改……
    
    6.bin/mysqld_safe --user=mysql &
    
    7.bin/mysql -u root -p 临时密码
    
    8.修改密码，并打开远程访问
    
        SET PASSWORD FOR 'root'@'localhost'=PASSWORD('yu1596321');
      
        GRANT ALL PRIVILEGES ON *.* TO 'root'@'%'IDENTIFIED BY 'yu1596321' WITH GRANT OPTION; 
        
    9.export PATH = $PATH:/usr/local/mysql/bin
            source /etc/profile
    10. cp /usr/local/mysql/mysql.server /etc/init.d/mysqld
    
    11.chkconfig --add mysqld && chkconfig mysqld on
    
    