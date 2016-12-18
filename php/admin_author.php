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
			<h4>足协联系人管理：</h4>
			<table class="table table-bordered">
			<thead>
			<tr>
			<td>职务</td>
			<td>姓名</td>
			<td>联系电话</td>
			<td>操作</td>
			</tr>
			</thead>
			<tbody>			
				<?
				require_once "config.inc.php";				
				$sql="select * from contact";
				$result = mysql_query($sql) or die(mysql_error());
				while($selcontact=mysql_fetch_array($result)){
					echo "<td>".$selcontact['title']."</td>";
					echo "<td>".$selcontact['name']."</td>";
					echo "<td>".$selcontact['phone']."</td>";
					echo "<td><a href='admin_cont.php?title=".$selcontact['title']."'>修改</a></td>";
					echo "</tr>";
				}			
				?>
			</tbody>
			</table>
			<h4>球队帐号管理</h4>
			<table class="table table-bordered">
			<thead>
			<tr>
			<td>账号描述</td>
			<td>登录名</td>
			<td>密码</td>
			<td>操作</td>
			</tr>
			</thead>
			<tbody>			
				<?
				require_once "config.inc.php";				
				$sql2="select * from author ";
				$result2 = mysql_query($sql2) or die(mysql_error());
				while($selauthor=mysql_fetch_array($result2)){
					echo "<td>".$selauthor['name']."</td>";
					echo "<td>".$selauthor['user']."</td>";
					echo "<td>".$selauthor['pw']."</td>";
					echo "<td><a href='admin_author_edit.php?id=".$selauthor['id']."'>修改</a>";
					if($selauthor['right']==1){
						echo " | <a href='admin_author_delete.php?id=".$selauthor['id']."'>删除</a>";
					}
					echo "</td>";
					echo "</tr>";
				}			
				?>
			</tbody>
			</table>
			<h5><a href='admin_author_edit.php'>+增加球队帐号>></a></h5>
            </div>
        </div>
    </div>
</div>

<? include 'footer_admin.html'; ?>
</body>
</html>