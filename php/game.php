<? include 'header.html'; ?> 
<body>
<? include 'div_login.html'; ?>
<div style="width:90%;margin:0 auto;background:white">
<div class="meun">
		<div class="meun_bg"></div>
		<ul>
			<li><a href="index.php"><span>首页</span></a></li>
			<li class="current"><a href="game.php"><span>比赛</span></a></li>
			<li><a href="news.php"><span>新闻</span></a></li>
			<li><a href="team.php"><span>球队</span></a></li>
			<li><a href="about.php"><span>关于</span></a></li>
		</ul>
	</div>
<!--标签页-->
<div class="pt20 container ">
    <!-- Nav tabs -->
    <div class="col-xs-4">
    <img src="img/ad_2.jpg" />
    </div>
    <div class="col-xs-8">
        <ul class="nav nav-tabs mb20" role="tablist">
            <li role="presentation" class="active"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab" style="font-size:16px;color:orangered;"> <span class="glyphicon glyphicon-king" style="color:orangered"></span> 积分榜</a></li>
            <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab" style="font-size:16px;color:orangered;"> <span class="glyphicon glyphicon-list-alt" style="color:orangered"></span> 赛程表</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="profile">
                <table class="table table-bordered text-center">
                    <tr style="font-size:16px;font-weight:bold">
                        <td> <span class="glyphicon glyphicon-arrow-down" style="color:orangered"></span> 名次</td>
                        <td>球队</td>
                        <td>总分</td>
						<td>比赛场次</td>
						<td>胜</td>
						<td>平</td>
						<td>负</td>
						<td>进球</td>
						<td>失球</td>
						<td>净胜球</td>
					</tr>
<?
require_once "config.inc.php";

$sql1="select * from season order by id desc";
				$query1=mysql_query($sql1) or die(mysql_error());
				if($result=mysql_fetch_array($query1)){
					if($result['state']==0){
						echo "<p>*提示：比赛报名中，暂无积分情况。<p>";
					}else{
						$year=$result['year'];
						$sql="select * from jifen,team where jifen.year='$year' and jifen.tid=team.id order by point DESC,advance DESC";
						$result = mysql_query($sql) or die(mysql_error());
						$i=1;
						while($jifen=mysql_fetch_array($result)){
							echo "<tr>";
							echo "<td>".$i."</td>";
							echo "<td>".$jifen['name']."</td>";
							echo "<td>".$jifen['point']."</td>";
							echo "<td>".$jifen['game']."</td>";
							echo "<td>".$jifen['win']."</td>";
							echo "<td>".$jifen['equal']."</td>";
							echo "<td>".$jifen['lost']."</td>";
							echo "<td>".$jifen['goal']."</td>";
							echo "<td>".$jifen['loss']."</td>";
							echo "<td>".$jifen['advance']."</td>";
							echo "</tr>";
							$i++;
						}
					}
				}else{
					echo "没有联赛历史记录，请等待第一次联赛开始！";
				}


?>  
                </table>
            </div>

            <div role="tabpanel" class="tab-pane" id="settings">
                <table class="table table-bordered text-center">
                    <tr style="font-size:16px;font-weight:bold">
                        <td class="col-md-2"> <span class="glyphicon glyphicon-arrow-down" style="color:orangered"></span> 场次</td>
                        <td class="col-md-4">对阵</td>
    					<td class="col-md-2">状态</td>
                    </tr>
 <?
				$sql1="select * from season order by id desc";
				$query1=mysql_query($sql1) or die(mysql_error());
				if($result=mysql_fetch_array($query1)){
					if($result['state']==0){
						echo "<p>*提示：比赛报名中，暂无比赛对战表。<p>";
					}else{
						$year=$result['year'];
						$j=1;
						$sql="select * from game where year='$year'";
						$query=mysql_query($sql) or die(mysql_error());
						while($game=mysql_fetch_array($query)){
							echo "<tr>";
							echo "<td>".$j."</td>";
							switch ($game['state']){
								case 1:
								echo "<td>".$game['taname'].$game['tagoal']." : ".$game['tbgoal'].$game['tbname']."</td>";
								echo "<td>已结束</td>";
								break;
								case 0:echo "<td>".$game['taname']." vs ".$game['tbname']."</td>";
								echo "<td>未进行</td>";
								break;
								}						
								$j++;
							}
						}
					}else{
						echo "没有联赛历史记录，请创建新的比赛！";
					}
					?>  
                </table>
            </div>
        </div>
    </div>
    </div>

</div>
<? include 'footer.html'; ?>  
</body>
</html>
