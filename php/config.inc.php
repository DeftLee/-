<?php
 $server="localhost";  //mysql服务器地址
 $dbuser="root";         //登陆mysql的用户名
 $pass="";          //登陆mysql的密码
 $db_name="football";   //mysql中要操作的数据库名

 $hd=mysql_connect($server,$dbuser,$pass) or die("<P>抱歉，数据库服务器无法连接");
 $db=mysql_select_db($db_name,$hd)   or die("<p>出错，无法连接数据库".$db_name);
 mysql_query('SET names utf8');   

?>