<? 
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
            <p  class="white text-center font22 lineh42">比赛管理</p>
        </div>
    </div>
</nav>
<div class="container" style="min-height:400px;">
    <div class="row">
        <div class="col-md-2 mt20">
            <a class="btn btn-info block mt20 wid50" href="admin_game.php">开启比赛</a>
            <a class="btn btn-info block mt20  wid50" href="admin_bao.php">报名管理</a>
            <a class="btn btn-info block mt20  wid50" href="admin_game_saig.php">赛事管理</a>
            <a class="btn btn-info block mt20  wid50 dblue" href="admin_game_guan.php">比赛汇总</a>
            <a class="btn btn-info block mt20  wid50" href="admin.php">返回</a>
        </div>
        <div class="col-md-9 ">
            <div class="js-contact-show wid100 ">
<?
require_once "config.inc.php";
$sql="select * from jifen,season,team where season.state=1 and jifen.year=season.year and jifen.tid=team.id order by point DESC,advance DESC";
$result = mysql_query($sql) or die(mysql_error());
if((mysql_num_rows($result))==0){
	echo "<h4>不在比赛进行期，无积分情况。</h4>";
}else{
	echo '<h4>积分榜</h4><div class="row">';                
	$i=1;
	echo '<table class="table table-bordered text-center">';
	echo "<thead><tr>";
	echo "<td>名次</td>";
	echo "<td>球队</td>";
	echo "<td>总分</td>";
	echo "<td>比赛场次</td>";
	echo "<td>胜</td>";
	echo "<td>平</td>";
	echo "<td>负</td>";
	echo "<td>进球</td>";
	echo "<td>失球</td>";
	echo "<td>净胜球</td>";
	echo "</tr></thead><tbody>";
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
	echo "</tbody></table>";
}


?>
</div>                            
<?
$close="select * from season where state=1 ";
$query = mysql_query($sql) or die(mysql_error());
if($re=mysql_fetch_array($query)) {
	echo '<p><a href="match_close.php"><button class="btn btn-default mt20">确认并关闭比赛</button></a></p>'; 
}              

?>
            
        </div>
    </div>
</div>

<? include 'footer_admin.html'; ?>
</body>
</html>
