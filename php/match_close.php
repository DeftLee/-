<?php
include 'session_admin.php';
include 'header.html'; 

require_once "config.inc.php";
echo "比赛关闭中。。。";

$sql1 ="update season set state=2 where state!=2";
$del=mysql_query($sql1) or die('修改语句执行失败！');
if(mysql_affected_rows()){
	echo "<script>alert('比赛已关闭！');location.href='admin_game_guan.php';</script>";
}else{
	echo "<script>alert('比赛状态没改变！');location.href='admin_game_guan.php';</script>";
}
?>