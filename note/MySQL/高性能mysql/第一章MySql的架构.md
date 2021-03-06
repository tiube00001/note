 
### 1.1 MYSQL结构
一般储存引擎不会解析SQL，但总有例外
 
#### 1.2 并发控制
共享锁（shared lock）=读锁（read lock）

排它锁（exclusive lock）=写锁（write lock）

Mysql  ISAM 支持到表锁（table lock），

innodb支持到行锁（row lock）
#### 1.3 事务
#### 1.3.1 事务的ACID特性：

A：automicity，原子性，事务不可再分割

C：一致性，

I：isolation，隔离性

D：durability，持久性

#### 1.3.2 Mysql事务的四个隔离级别：

1， READ UNCOMMITTED（未提交读）事务中的修改即使未提交，对其他事务也是可见的。导致的问题是：其他事务可以读取未COMMIT的数据，称为：脏读(Dirty Read);

2，	READ COMMITTED （提交读）(又称：nonrepeatable read：不可重复读)大多数数据库的默认事务隔离级别，但MySQL不是……

3，	REPEATABLE READ （可重复读）
此是MySQL的默认隔离级别，解决脏读（dirty read）问题，保证同一事务中，重复读取数据的一致性。但是无法解决：幻读（Phantom Read）问题。但是innodb和XtraDB通过MVVC控制解决了幻读

4，	SERIALIZALBE （可串行化）
最高的隔离级别，强制事务串行执行。可以解决幻读问题，但是它会在读取的每一行数据中加锁，会导致大量的超时和锁争用问题。只有在非常需要保证一致性，且可接受没有并发的情况下使用。
##### 事务的死锁问题：
死锁的定义：多个事务在同一资源上相互占用，并请求锁定对方占用的资源，从而导致的恶性循环

死锁出现的情况：1.当多个事务试图以不同顺序锁定同一资源时，2.多个事务同时锁定同一资源时

InnoDB目前处理死锁，是将持有最少行级排他锁的事务进行回滚

### 1.3.3 事务日志

预写式日志：Write-Ahead Logging，修改数据要写两次磁盘，是主流事务日志

### 1.3.4 MYSQL中的事务

#### 自动提交（AUTOCOMMIT）

MySql默认是将一个查询当作一个事务处理，

查看事务提交设置：SHOW VARIABLES LIKE 'AUTOCOMMIT'

设置事务是否自动提交：SET AUTOCOMMIT = 1/0 | on/off

设置事务隔离级别：SET SESSION TRANSACTION ISOLATION LEVEL [READ UNCOMMITTED | READ COMMITTED | REPEATABLE READ | SERIALIZABLE]

#### 在事务中混合使用储存引擎是不可靠的

#### 隐式和显式锁定

一般情况，事务中除了设置：AUTOCOMMIT，不要显示执行LOCK TABLES，不管是使用啥储存引擎

### 1.4 多版本并发控制

多版本并发控制：MVCC，分为：1.乐观并发控制（optimistic），2.悲观并发控制（pessimistic）

MVCC只在：REPEATABLE READ，READ COMMITTED两个事务等级上起作用，READ UNCOMMITTED总是读取最新的行而不是符合事务要求的行，SERIALIZABLE会给所有读取的行加锁 

### 1.5.6 转换表的储存引擎

1.直接执行语句：ALERT TABLE table_name ENGINE = InnoDB;

优点：简单易用
缺点：原表会被加锁，且消耗掉系统几乎所有的I/O，如果数据量大，时间会很长

2.使用mysqldump工具，将数据导出到文件，再修改文件中的CREATE TABLE语句，最后再导回去。（注意：同时要修改原表表名，mysqldump会默认执行DROP TABLE）

3.先创建新表，再将原表数据全部复制到新表：
    
    START TRANSACTION;
    CREATE TABLE new_table LIKE old_table;
    INSERT INTO new_table SELECT * FROM old_table WHERE id BETWEEN x AND y
    COMMIT;
    (其中，x和y进行相应的替换，就可以全表镜像复制)
    注意：Percona Toolkit提供了一个pt-online-schema-change（基于Facebook的在线schema变换技术）的工具，可以简单实现上述过程，避免手工操作出现失误    