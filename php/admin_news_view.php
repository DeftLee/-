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
                <div class="col-md-6">
            <div class="overhide text-center">
<?php			
            require_once "config.inc.php";
			$query = "select * from news where id=".$_GET['id'].";";
			$result = mysql_query($query);
			while($re = mysql_fetch_array($result)){
				echo '<span>标题：'.$re['title'].'</span>';
				echo '<span class="fr"> 日期：'.$re['date'].'</span>';
				echo '</div>';
                echo '<div>'.$re['body'].'</div>';
				echo '<div>';
				switch($_GET['from']){
					case 1:echo '<a href="admin_xin.php">返回</a> | ';break;
					case 2:echo '<a href="admin_qiu.php">返回</a> | ';break;					
				}				
				echo '<a href="news_delete.php?id='.$_GET['id'].'&from='.$_GET['from'].'">删除本文</a>';
				echo '</div>';
			}    
?>
				</div>
			</div>
		</div>
	</div>
</div>

<? include 'footer_admin.html'; ?>
</body>
</html>