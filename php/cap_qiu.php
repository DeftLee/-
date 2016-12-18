<? 
include 'session_captain.php';
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
               <p  class="white text-center font22 lineh42">队长管理</p>
        </div>
    </div>
</nav>
<div class="container "  style="min-height:570px;">
    <div class="row">
        <div class="col-md-3 mt20">
            <a class="btn btn-info block mt20 js-intro wid50" href="cap_bao.php">比赛报名</a>
            <a class="btn btn-info block mt20 js-culture wid50" href="cap_dui.php">队员查看</a>
            <a class="btn btn-info block mt20 js-construct wid50" href="cap_bi.php">比赛情况</a>
            <a class="btn btn-info block mt20 js-contact wid50 dblue" href="cap_qiu.php">球队新闻管理</a>
            <a class="btn btn-info block mt20 js-news wid50" href="cap_fa.php">发布球队新闻</a>
            <a class="btn btn-info block mt20 js-contact wid50" href="index.php">返回足协官网</a>
        </div>
        <div class="col-md-9 mt20 ">

            <div class=" js-contact-show wid100 text-center">

                <table class="table-bordered table text-center">
                    <thead>
                    <tr>
                        <td class="col-md-1">编号</td>
                        <td class="col-md-3">标题</td>
                        <td class="col-md-3">操作</td>
                    </tr>
                    </thead>
                    <tbody>
<?php
   $count=1;
   $id=$_SESSION['id'];
   require_once "config.inc.php";
   $query = "select * from news where writer_id='$id'";
   $result = mysql_query($query) or die(mysql_error());
   while($re = mysql_fetch_array($result)){
		echo '<tr><td>'.$count.'</td>';
		echo '<td>'.$re['title'].'</td>';
		echo '<td><a href="cap_fa.php?id='.$re['id'].'">编辑</a>';
		echo ' | ';
		echo '<a href="news_delete.php?id='.$re['id'].'&from=3">删除</a></td>';
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
