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
<div class="container mt50 f5">
    <div class="row mt20">
        <div class="col-md-3" style="background:white;">
            <p style="font-size:18px;font-weight:bold;background-color:#ddd;color:orangered;line-height:30px;" class="text-center"><span class="glyphicon glyphicon-fire" style="color:orangered"></span> 最新新闻</p>
<?php
			$id=$_GET['id'];
			require_once "config.inc.php";
			$query = "select * from news where id != '$id' and writer_right=0;";
			$result = mysql_query($query) or die(mysql_error());
			while($re = mysql_fetch_array($result)){
				echo '<p><a href="javascript:;">'.'<a href="news-child.php?id='.$re['id'].'">'.$re['title'].'('.$re['date'].')</a></p>';
			}
?>
        </div>
        <div class="col-md-7 col-md-offset-1" style="background:white;">
            <div class="overhide text-center">
<?php			
            require_once "config.inc.php";
			$query = "select * from news where id=".$_GET['id'].";";
			$result = mysql_query($query);
			while($re = mysql_fetch_array($result)){
				echo '<span style="font-size:20px;font-weight:bold;margin-bottom:10px;display:inline-block;color:orange">'.$re['title'].'</span>';
				echo '<span class="fr" style="margin-top: 6px;color: gray;font-size: 13px;"><span class="glyphicon glyphicon-time" style="color:orange"></span> '.$re['date'].'</span>';
				echo '</div>';
                echo '<div style="font-size: 17px;line-height: 30px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$re['body'].'</div>';
			}
            
?>
		</div>
	</div>
</div>
</div>
<? include 'footer.html'; ?> 
</body>
</html>
