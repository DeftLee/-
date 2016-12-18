<?php
include 'session_admin.php';
include 'header.html'; 
?>
<body>
<? include 'div_logout.php'; ?>
<nav class="navbar navbar-default  navbar-inverse" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#demo-navbar">
                <span class="sr-only">toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse  font16" id="demo-navbar">
            <p  class="white text-center font22 lineh42">后台管理</p>
        </div>
    </div>
</nav>
<div class="container mt50">
    <div class="row">
        <? include 'nav_admin.html';?>
        <div class="col-md-9 mt20 ">
            <div class="  wid100 text-center">
			<?
			if(is_array($_GET)&&count($_GET)>0){
				if(isset($_GET["id"])){
					echo '<form method="post" action="news_update.php?id='.$_GET["id"].'">';
					require_once "config.inc.php";
					$id=$_GET['id'];
					$query = "select * from news where id='$id'";
					$result = mysql_query($query) or die(mysql_error());
					while($re = mysql_fetch_array($result)){
						echo '<p>标题 <input type="text" class="ml20 wid50" name="title" value="'.$re['title'].'"></p>';
						echo '<textarea name="body" cols="100" rows="10">'.$re['body'].'</textarea>';
						echo '<p class="mt20"><input type="submit" value="发布" /></p>';
					}
				}else if(isset($_GET['title']) && isset($_GET['body'])){
						echo '<form method="post" action="news_insert.php">';
						echo '<p>标题 <input type="text" class="ml20 wid50" name="title" value="'.$_GET['title'].'"></p>';
						echo '<textarea name="body" cols="100" rows="10">'.$_GET['body'].'</textarea>';
						echo '<p class="mt20"><input type="submit" value="发布" /></p>';
					}
			}else{
				echo '<form method="post" action="news_insert.php">';
				echo '<p>标题： <input type="text" name="title" class="ml20 wid50"></p>';
                echo '<textarea name="body" cols="100" rows="10" placeholder="请输入发布内容"></textarea>';
                echo '<p class="mt20"><input type="submit" value="发布" /></p>';
			}       
			?>
            </div>
    </div>
</div>
<? include 'footer_admin.html'; ?>
</body>
</html>
