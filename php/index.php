<? include 'header.html'; ?> 
<body>
<? include 'div_login.html'; ?>
<div style="width:90%;margin:0 auto;background:white">
<div class="meun">
		<div class="meun_bg"></div>
		<ul>
			<li class="current"><a href="index.php"><span>首页</span></a></li>
			<li><a href="game.php"><span>比赛</span></a></li>
			<li><a href="news.php"><span>新闻</span></a></li>
			<li><a href="team.php"><span>球队</span></a></li>
			<li><a href="about.php"><span>关于</span></a></li>
		</ul>
	</div>
<div class="container mt20">

    <div class="row">
    <div class="col-xs-4 mb20 ad_img">
    <img src="img/ad_1.jpg">
    <p>
    <span data-url="1"></span>
    <span data-url="2"></span>
    <span data-url="3"></span>
    </p>
        </div>
        <div class="col-xs-4">
 <p class="mb5 f18 deepblue"><span class="glyphicon glyphicon-eye-open" style="color:orange"></span> 新闻详情</p>
            <table class="table table-bordered" id="index-table-one">
<?php
			require_once "config.inc.php";
			$query = "select * from news order by date desc";
			$result = mysql_query($query);
			while($re = mysql_fetch_array($result)){
				echo '<tr><td>'.'<a href="news-child.php?id='.$re['id'].'">'.$re['title'].'</td><td>'.$re['date'].'</td></tr>';
			}
?>
			</table>

        </div>
        <div class="col-xs-4">
        <p class=" f18 mb5 deepblue"><span class="glyphicon glyphicon-grain" style="color:orange"></span> 联赛详情</p>
		<div class="border overhide p5 mb20">
		<?php
		require_once "config.inc.php";
		$query = "select * from season order by id DESC";
		$result = mysql_query($query);
		if($re = mysql_fetch_array($result)){
			echo '<div class="fl">联赛情况:</div>';
			switch($re['state']){
				case 0:echo '报名中';break;
				case 1:echo '进行中';break;
				default:echo '已结束';break;
				}
				echo '<div class="fr">'.$re['year'].'赛季</div>';
				}
        ?>
		</div>
        <p class="f18 mb5 deepblue"><span class="glyphicon glyphicon-king" style="color:orange"></span> 积分榜</p>
		<table class="table table-bordered text-center">
		<thead>
		<tr>
		<td>名次</td>
		<td>球队</td>
		<td>积分</td>
		</tr>
        </thead>
        <?
		require_once "config.inc.php";
$query = "select * from season order by id DESC";
$result = mysql_query($query)or die(mysql_error());
if($re = mysql_fetch_array($result)){	
	if($re['state']==0){
		if($next=$re = mysql_fetch_array($result)){
			$year=$next['year'];
			echo "<p>*该积分榜为上赛季积分</p>";
		}
	}else{
		$year=$re['year'];		
	}
	$sql="select * from jifen,team where  jifen.year='$year' and jifen.tid=team.id order by point DESC,advance DESC";
	$result = mysql_query($sql) or die(mysql_error());
	$i=1;
	while($jifen=mysql_fetch_array($result)){
		echo "<tr>";
		echo "<td>".$i."</td>";
		echo "<td>".$jifen['name']."</td>";
		echo "<td>".$jifen['point']."</td>";
		echo "</tr>";
		$i++;
		}
}else{
	echo "暂时没有赛事历史记录，请创建新赛季！";
}
?>
                            </table>

        </div>


        </div>
        <div class="row">
        <div class="col-xs-8">
<p class=" f18 mb5 deepblue"><span class="glyphicon glyphicon-tasks" style="color:orange"></span> 足协简介</p>
        <p class="border p5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;广东外语外贸大学足球协会创建于1999年，目前会员已超过200名，它是一个为足球爱好者搭建的平台，协会致力于推广快乐足球文化。<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;协会一直努力做好每一个活动，已成功举办“广外杯”足球赛，三人足球赛赛等传统比赛项目。10-11年度，协会创办了首届足协联赛。<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;此外，足协球迷部还未会员提供了一系列的福利，例如优惠购买广州恒大比赛门票，组织看恒大训练，零距离接触恒大球员，还可以与球员合照留念，获得亲笔签名等。<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;无论你是喜欢踢球，还是喜欢看球赛，只要你热爱足球，我们都期待你成为足协大家庭的一员。</p>
			</div>
			<div class="col-xs-4">
			 <p class='f18 mb5 deepblue'><span class="glyphicon glyphicon-earphone" style="color:orange"></span> 联系人：</p>
			 <div class="border mb20">
			 <?php
			 require_once "config.inc.php";
			 $query = "select * from contact";
			 $result = mysql_query($query);
			 while($re = mysql_fetch_array($result)){
				 echo "<p class='p5'>".$re['name']."(".$re['title'].")"." : ".$re['phone']. "</p>";
				 }
				 ?>
			</div>
		</div>
    </div>

    <div class="row mt20">
        <div class="col-xs-8 ">

        </div>
        <div class="col-xs-4">
        </div>
    </div>
</div>
</div>
<? include 'footer.html'; ?>
<script src="js/index.js"></script>
</body>

</html>
