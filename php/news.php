<? include 'header.html'; ?>
<body>
<? include 'div_login.html'; ?>
<div style="width:90%;margin:0 auto;background:white">
<div class="meun">
		<div class="meun_bg"></div>
		<ul>
			<li><a href="index.php"><span>首页</span></a></li>
			<li><a href="game.php"><span>比赛</span></a></li>
			<li class="current"><a href="news.php"><span>新闻</span></a></li>
			<li><a href="team.php"><span>球队</span></a></li>
			<li><a href="about.php"><span>关于</span></a></li>
		</ul>
	</div>
<div class="container ">
    <div class="row">
        <h3 class="text-center" style="padding-bottom:8px;color:orange;">广外足球新闻</h3>
        <div class="col-xs-4">
        <img src="img/ad_1.jpg" />
        </div>
        <div class="col-xs-8 ">
        <table class="table table-bordered text-center">
<?php
	require_once "config.inc.php";
	$query = "select * from news order by date desc";
	$result = mysql_query($query);
	while($re = mysql_fetch_array($result)){
		echo '<tr><td class="col-md-8"><a href="news-child.php?id='.$re['id'].'"><span class="glyphicon glyphicon-link" style="color:orangered"></span> ';
		switch($re['writer_right']){
				case 0:echo "【官方新闻】";break;				
				case 1:echo "【球队动态】";break;
			}
		echo $re['title'].'</td><td class="col-md-4"><span class="glyphicon glyphicon-time" style="color:orangered"></span> '.$re['date'].'</td></tr>';
	}
?>
        </table>
        </div>
    </div>
</div>
</div>
<? include 'footer.html'; ?>
</body>
</html>
