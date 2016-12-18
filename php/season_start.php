<?
include 'session_admin.php';
include 'header.html'; 

require_once "config.inc.php";
$sql1="select * from season where state!=2";
$query=mysql_query($sql1) or die('sql1');
if($result=mysql_fetch_row($query)){
	echo "<script>alert('已有比赛开启中，不能重复开启！');location.href='admin.php';</script>";
}else{
	$num=$_POST['player_num'];
	$year=$_POST['year'];
	$sql2="insert into season (year, player_num) value('$year', '$num')";
	$insert=mysql_query($sql2) or die('sql2');
	$affect=mysql_affected_rows();
	if($affect>0){
		echo "<script>alert('已开启比赛！');location.href='admin_bao.php';</script>";
	}else{
		echo "<script>alert('开启比赛失败！');location.href='admin_game.php';</script>";
	}
}
?>