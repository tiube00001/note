### 建立nginx启动脚本
    1./usr/lib/systemd/system存放的是系统应用（不需要登录就能启动的）
    2./usr/lib/systemd/user存放的是登录后再启动的脚本
    3.建立文件/usr/lib/systemd/system/nginx.service
    4.输入以下代码：
        [Unit]
        Description=nginx - high performance web server 
        Documentation=http://nginx.org/en/docs/
        After=network.target remote-fs.target nss-lookup.target
        
        [Service]
        Type=forking
        PIDFile=/var/run/nginx.pid
        ExecStartPre=/usr/sbin/nginx -t -c /etc/nginx/nginx.conf
        ExecStart=/usr/sbin/nginx -c /etc/nginx/nginx.conf
        ExecReload=/bin/kill -s HUP $MAINPID
        ExecStop=/bin/kill -s QUIT $MAINPID
        PrivateTmp=true
        
        [Install]
        WantedBy=multi-user.target
    （注意将其中的路径，改写成当前的）
    5.sudo systemctl enable nginx.service
    6.sudo systemctl start nginx.service
    7.注意点：systemctl只能管理自己启动的服务，不能管理其他方式启动的