<?php
/***
 * 描述:MySQL宽字节注入案例
 * 
MariaDB [cms]> 
create table user(
`id` INT(4) NOT NULL DEFAULT '1',
`user` VARCHAR(255) NOT NULL DEFAULT "NULL",
`pass` VARCHAR(255) NOT NULL DEFAULT "NULL");

create table content(
`id` INT(4) NOT NULL DEFAULT '1',
`user` VARCHAR(255) NOT NULL DEFAULT "WeiY",
`context` VARCHAR(255) NOT NULL DEFAULT "this is demo");

insert into user value (1,"admin",md5("1223456"));
MariaDB [cms]> select * from user;
+----+-------+----------------------------------+
| id | user  | pass                             |
+----+-------+----------------------------------+
|  1 | admin | 6590f73ecdf351c38de00befd2ecf17b |
+----+-------+----------------------------------+
1 row in set (0.00 sec)

insert into content value (1,"weiyigeek");

#支持识别16进制
MariaDB [cms]> select * from user where id = 1 union select 1,user(),concat(user,0x7e,context) from content;
+----+----------------+----------------------------------+
| id | user           | pass                             |
+----+----------------+----------------------------------+
|  1 | admin          | 6590f73ecdf351c38de00befd2ecf17b |
|  1 | root@localhost | weiyigeek~this is a demo         |
+----+----------------+----------------------------------+
2 rows in set (0.00 sec)
**/

$link = new mysqli('localhost', 'root','123456', 'cms');
if(!$link){
    die("数据库连接失败!");
}else{
    echo "数据库连接成功!";
}

$link->query("set NAMES gbk");
$id_tmp=isset($_GET['id'])?urldecode($_GET['id']):"null";
$id=iconv("gbk","utf-8",$id_tmp);
$sql="SELECT * FROM user WHERE id = '{$id}'";
echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."?".urldecode($_SERVER['QUERY_STRING']);
echo "<br>执行的SQL语句:".$sql;

foreach($link->query($sql) as $row){
    echo "<br/>";
    print("\n".$row['user']."\n".$row['pass']);
}
?>