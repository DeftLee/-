<?
include 'session_admin.php';
include 'header.html'; 

if(isset($_POST['name'])){
	$name=$_POST['name'];
}else{
	$name="后台管理员";
}
$id=$_POST['id'];
$user=$_POST['user'];
$pw=$_POST['pw'];
require_once "config.inc.php";
$sql ="update author set name='$name', user='$user', pw='$pw' where id='$id'";
$update=mysql_query($sql) or die(mysql_error());
if(mysql_affected_rows()){
	echo "<script>alert('更新成功！');location.href='admin_author.php';</script>";
}else{
	echo "<script>alert('更新失败！');location.href='admin_author_edit.php';</script>";
}
?>
