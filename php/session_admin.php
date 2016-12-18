<?php
session_start();
if(!isset($_SESSION['name'])||$_SESSION['right']!=0)
{
	echo"<script language='javascript'>alert('非法操作，请先登陆！');location.href='login.html';</script>";
}
?>