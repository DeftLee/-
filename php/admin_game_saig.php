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
            <a class="btn btn-info block mt20 wid50 " href="admin_game.php">开启比赛</a>
            <a class="btn btn-info block mt20  wid50" href="admin_bao.php">报名管理</a>
            <a class="btn btn-info block mt20  wid50 dblue" href="admin_game_saig.php">赛事管理</a>
            <a class="btn btn-info block mt20  wid50" href="admin_game_guan.php">比赛汇总</a>
            <a class="btn btn-info block mt20  wid50" href="admin.php">返回</a>
        </div>
        <div class="col-md-9 ">
            <div class="js-construct-show wid100">       
<?
require_once 'config.inc.php';
$sql="select game.id,game.taname,game.tbname,game.state from game,season where season.state!=2 and game.year=season.year ";
$query=mysql_query($sql) or die(mysql_error());
if((mysql_num_rows($query))==0){
	echo "<h4>不在比赛进行期，无积分情况。</h4>";
}else{
	echo '<table class="table table-bordered">';
	echo "<thead><tr>";
	echo "<td>场次</td>";
	echo "<td>对阵</td>";
	echo "<td>状态</td>";
	echo "<td>管理</td>";
    echo "</tr></thead><tbody>";
	$i=1;
	while($game=mysql_fetch_array($query)){
		echo "<tr>";
		echo "<td>".$i."</td>";
		echo "<td>".$game['taname']."vs".$game['tbname']."</td>";
		$gid=$game['id'];
		switch($game['state']){
			case 0:echo "<td>未登记</td><td><a href='admin_game_sai.php?gid=$gid'>登记</a></td>";break;
			case 1:echo "<td>已登记</td><td><a href='admin_game_sai.php?gid=$gid'>编辑</a></td>";break;
		}
		echo "</tr>";
		$i++;
	}
	if($i==1){
		echo "不在比赛进行期，无积分情况。";
	}
}

?>
    </tbody>
</table>
                </div>
        </div>
    </div>
</div>
<? include 'footer_admin.html'; ?>
<script src="js/admin-game.js"></script>
</body>
</html>
