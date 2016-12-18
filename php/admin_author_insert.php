<?
include 'session_admin.php';
include 'header.html';
 
$name=$_POST['name'];
$user=$_POST['user'];
$pw=$_POST['pw'];
require_once "config.inc.php";
$sql ="insert into author set name='$name', user='$user', pw='$pw' ";
$update=mysql_query($sql) or die(mysql_error());
if(mysql_affected_rows()){
	echo "<script>alert('添加成功！');location.href='admin_author.php';</script>";
}else{
	echo "<script>alert('添加失败！');location.href='admin_author_edit.php';</script>";
}
?>
