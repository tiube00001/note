#### http协议的URL

##### 格式示例：http://host[":"port][abs_path]
    1.http 表示要通过HTTP 协议来定位网络资源
    2.host 表示合法的Internet 主机域名或者IP 地址
    3.port 指定一个端口号，为空则使用缺省端口80
    4.abs_path 指定请求资源的URI；如果URL 中没有给出abs_path，那么当它作为请求URI 时，必须以“/”的形式给出，通常这个工作浏览器自动帮我们完成
 
#### http协议的请求

##### http 请求由三部分组成，分别是：请求行、消息报头、请求正文

1.请求行：

    格式：Method Request-URI HTTP-Version CRLF
    翻译：请求方法 请求URI HTTP版本 回车换行
    示例：GET /index.html HTTP/1.1

2.请求方法：

      GET 请求获取Request-URI 所标识的资源
      POST 在Request-URI 所标识的资源后附加新的数据
      HEAD 请求获取由Request-URI 所标识的资源的响应消息报头
      PUT 请求服务器存储一个资源，并用Request-URI 作为其标识
      DELETE 请求服务器删除Request-URI 所标识的资源
      TRACE 请求服务器回送收到的请求信息，主要用于测试或诊断
      CONNECT 保留将来使用
      OPTIONS 请求查询服务器的性能，或者查询与资源相关的选项和需求 
      
3.