<?php
session_start();
if(!isset($_SESSION['name'])){
	echo "<script language='javascript'>alert('非法操作，请先登陆！');location.href='login.html';</script>";
}
include 'header.html'; 

echo "新闻发布中。。。";
$date=date('Y-m-d');
$title=$_POST['title'];
$body=$_POST['body'];
$writer_right=$_SESSION['right'];
$writer_id=$_SESSION['id'];
require_once "config.inc.php";
$sql1 ="INSERT INTO news (title,date,writer_right,body,writer_id) VALUES ('$title', '$date', '$writer_right', '$body', '$writer_id')";
$insert=mysql_query($sql1) or die(mysql_error());
$check=mysql_query("SELECT id FROM news WHERE title='$title'");
if($row = mysql_fetch_array($check)){
	switch($writer_right){
		case 0:echo "<script>alert('发布成功！');location.href='admin_news_view.php?id=".$row['id']."& from=1';</script>";break;
		case 1:echo "<script>alert('发布成功！');location.href='cap_qiu.php';</script>";break;
	}	
}else{
	switch($writer_right){
		case 0:echo "<script>alert('发布失败！');location.href='admin_news_edit.php?title='$title'& body='$body';</script>";break;
		case 1:echo "<script>alert('发布失败！');location.href='cap_fa.php?title='$title'& body='$body';</script>";break;
	}
}
?>