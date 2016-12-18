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
            <div class="js-culture-show wid100">

                <table class="table-bordered table text-center">
                    <thead>
                    <tr>
                        <td>编号</td>
                        <td>标题</td>
                        <td>操作</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
				   $count=1;
				   require_once "config.inc.php";
				   $query = "select * from news where writer_right=1";
				   $result = mysql_query($query);
				   while($re = mysql_fetch_array($result)){
					   echo '<tr><td>'.$count.'</td>';
					   echo '<td>'.$re['title'].'</td>';
					   echo '<td><a href="admin_news_view.php?id='.$re['id'].'&from=2">查看</a>';
					   echo ' | ';
					   echo '<a href="news_delete.php?id='.$re['id'].'&from=2">删除</a></td>';
					   $count++;
					   }
					?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<? include 'footer_admin.html'; ?>
</body>
</html>
