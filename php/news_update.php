<?php
session_start();
if(!isset($_SESSION['name'])){
	echo "<script language='javascript'>alert('非法操作，请先登陆！');location.href='login.html';</script>";
}
include 'header.html'; 

$id=$_GET['id'];
$date=date('Y-m-d');
$title=$_POST['title'];
$body=$_POST['body'];
$writer_right=$_SESSION['right'];
$writer_id=$_SESSION['id'];
require_once "config.inc.php";
$sql1 ="update news set title='$title',date='$date',writer_right='$writer_right',body='$body',writer_id='$writer_id' where id='$id'";
$update=mysql_query($sql1) or die(mysql_error());
if(mysql_affected_rows()){
	$right=$_SESSION['right'];
	switch($right){
		case 0:echo "<script>alert('更新成功！');location.href='admin_news_view.php?id=".$id."& from=1';</script>";break;
		case 1:echo "<script>alert('更新成功！');location.href='cap_fa_view.php?id=".$id."';</script>";break;
	}	
}else{
	echo "<script>alert('更新失败！');location.href='admin_news_edit.php?id=".$id."';</script>";
}
?>