<?php
session_start();
if(!isset($_SESSION['name'])){
	echo "<script language='javascript'>alert('非法操作，请先登陆！');location.href='login.html';</script>";
}
include 'header.html'; 

echo "删除中，请稍后。。。";
require_once "config.inc.php";
$sql1 ="delete from news where id=".$_GET['id'];
$del=mysql_query($sql1) or die(mysql_error());
$sql2="select * from news where id=".$_GET['id'];
$select=mysql_query($sql2) or die(mysql_error());
$count = mysql_num_rows($select);
if($count == 0){
	    switch($_GET['from']){
			case 1:echo "<script>alert('删除成功！');location.href='admin_xin.php';</script>";break;
			case 2:echo "<script>alert('删除成功！');location.href='admin_qiu.php';</script>";break;
			case 3:echo "<script>alert('删除成功！');location.href='cap_qiu.php';</script>";break;
		}	
}else{
        switch($_GET['from']){
			case 1:echo "<script>alert('删除失败！');location.href='admin_xin.php';</script>";break;
			case 2:echo "<script>alert('删除失败！');location.href='admin_qiu.php';</script>";break;
			case 3:echo "<script>alert('删除失败！');location.href='cap_qiu.php';</script>";break;
		}
}
?>