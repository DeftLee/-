<?
include 'session_admin.php';
include 'header.html'; 

$id=$_GET['id'];
require_once "config.inc.php";
$sql ="delete from author where id=$id ";
$delete=mysql_query($sql) or die(mysql_error());
if(mysql_affected_rows()){
	echo "<script>alert('删除成功！');location.href='admin_author.php';</script>";
}else{
	echo "<script>alert('删除失败！');location.href='admin_author.php';</script>";
}
?>