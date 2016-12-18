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
<div class="container "  style="min-height:650px;">
    <div class="row">
        <div class="col-md-3 mt20">
		<a class="btn btn-info block mt20 js-intro wid50" href="cap_bao.php">比赛报名</a>
		<a class="btn btn-info block mt20 js-culture wid50" href="cap_dui.php">查看队员</a>
		<a class="btn btn-info block mt20 js-construct wid50" href="cap_bi.php">比赛情况</a>
        <a class="btn btn-info block mt20 js-contact wid50" href="cap_qiu.php">球队新闻管理</a>
        <a class="btn btn-info block mt20 js-news wid50" href="cap_fa.php">发布球队新闻</a>
        <a class="btn btn-info block mt20 js-contact wid50" href="index.php">返回足协官网</a>
        </div>
        <div class="col-md-9 mt20 ">
            <div class="js-intro-show wid100 ">
<?
	require_once "config.inc.php";
	$query = "select * from season order by id desc";
	$result = mysql_query($query);
	if($re = mysql_fetch_array($result)){
		switch($re['state']){
		case 0:echo "<h4>".$re['year']."赛季正在报名中！</h4>";break;
		case 1:echo "<h4>".$re['year'].'赛季进行中！你可以点击左边导航按钮查看本学院参赛队员。</h4>';break;
		case 2:echo "<h4>".$re['year'].'赛季已结束！你可以点击左边导航按钮查看本学院球队战绩。</h4>';break;
	}
	}
?>
        </div>
    </div>
</div>
</div>
<? include 'footer_admin.html'; ?>
</body>
</html>
