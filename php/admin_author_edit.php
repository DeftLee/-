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
				if(isset($_GET['id'])){
					echo '<form method="post" action="admin_author_update.php">';
					$id=$_GET['id'];
					require_once "config.inc.php";
					$sql="select * from author where id='$id'";
					$result = mysql_query($sql) or die(mysql_error());
					while($author=mysql_fetch_array($result)){
						echo "<h5>请修改信息：</h5>";
						echo '<input type="hidden" class="ml20 wid50" name="id" value="'.$author['id'].'">';
						switch($author['right']){
							case 0:echo '<h5>权限描述：'.$author['name'].'</h5>';break;
							case 1:echo '<h5>权限描述：<input name="name" value="'.$author['name'].'"></h5>';break;
						}
						echo '<h5>登录名：<input name="user" value="'.$author['user'].'"></h5>';
						echo '<h5>密码：<input name="pw" value="'.$author['pw'].'"></h5>';
						echo '<h5><input type="submit" value="修改信息" /></h5>';
					}
				}else{
					echo '<form method="post" action="admin_author_insert.php">';
					echo "<h5>请输入相关信息：</h5>";
					echo '<h5>权限描述：<input name="name" ></h5>';
					echo '<h5>登录名：<input name="user" ></h5>';
					echo '<h5>密码：<input name="pw" ></h5>';
					echo '<h5><input type="submit" value="增加球队" /></h5>';
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