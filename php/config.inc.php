<?php
 $server="localhost";  //mysql��������ַ
 $dbuser="root";         //��½mysql���û���
 $pass="";          //��½mysql������
 $db_name="football";   //mysql��Ҫ���������ݿ���

 $hd=mysql_connect($server,$dbuser,$pass) or die("<P>��Ǹ�����ݿ�������޷�����");
 $db=mysql_select_db($db_name,$hd)   or die("<p>�����޷��������ݿ�".$db_name);
 mysql_query('SET names utf8');   

?>