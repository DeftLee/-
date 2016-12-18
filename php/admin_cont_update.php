<?
include 'session_admin.php';
include 'header.html'; 

$title=$_POST['title'];
$name=$_POST['name'];
$phone=$_POST['phone'];
require_once "config.inc.php";
$sql ="update contact set name='$name', phone='$phone' where title='$title'";
$update=mysql_query($sql) or die(mysql_error());
if(mysql_affected_rows()){
	echo "<script>alert('更新成功！');location.href='admin_author.php';</script>";
}else{
	echo "<script>alert('更新失败！');location.href='admin_cont.php?title=$title';</script>";
}
?>