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
            <div class="js-construct-show wid100">
                <?
				$title=$_GET['title'];
				echo '<form method="post" action="admin_cont_update.php">';
				require_once "config.inc.php";				
				$sql="select * from contact where title='$title'";
				$result = mysql_query($sql) or die(mysql_error());
				while($cont=mysql_fetch_array($result)){
					echo '<input type="hidden" class="ml20 wid50" name="title" value="'.$cont['title'].'">';
					echo "<h5>请修改".$cont['title']."信息：</h5>";
					echo '<h5>姓名：<input name="name" value="'.$cont['name'].'"></h5>';
					echo '<h5>电话：<input name="phone" value="'.$cont['phone'].'"></h5>';					
					echo '<h5><input type="submit" value="修改信息" /></h5>';
				}
				echo "</form>"
				?>
            </div>

        </div>
    </div>
</div>

<? include 'footer_admin.html'; ?>
</body>
</html>