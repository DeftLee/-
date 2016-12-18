<? 
include 'session_captain.php';
include 'header.html';
?>
<body>
<? include 'div_logout.php'; ?>
<nav class="navbar navbar-default  navbar-inverse" role="navigation">
    <div class="container"  style="min-height:650px;">
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
<div class="container ">
    <div class="row">
        <div class="col-md-3 mt20">
            <a class="btn btn-info block mt20 js-intro wid50" href="cap_bao.php">比赛报名</a>
            <a class="btn btn-info block mt20 js-culture wid50" href="cap_dui.php">队员查看</a>
            <a class="btn btn-info block mt20 js-construct wid50" href="cap_bi.php">比赛情况</a>
            <a class="btn btn-info block mt20 js-contact wid50" href="cap_qiu.php">球队新闻管理</a>
            <a class="btn btn-info block mt20 js-news wid50 dblue" href="cap_fa.php">发布球队新闻</a>
            <a class="btn btn-info block mt20 js-contact wid50" href="index.php">返回足协官网</a>
        </div>
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
				echo '<a href="cap_qiu.php">返回</a>';				
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
