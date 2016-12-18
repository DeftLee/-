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
            <p  class="white text-center font22 lineh42">比赛管理</p>
        </div>
    </div>
</nav>
<div class="container" style="min-height:400px;">
    <div class="row">
        <div class="col-md-2 mt20">
            <a class="btn btn-info block mt20 wid50" href="admin_game.php">开启比赛</a>
            <a class="btn btn-info block mt20  wid50 dblue" href="admin_bao.php">报名管理</a>
            <a class="btn btn-info block mt20  wid50" href="admin_game_saig.php">赛事管理</a>
            <a class="btn btn-info block mt20  wid50" href="admin_game_guan.php">比赛汇总</a>
            <a class="btn btn-info block mt20  wid50" href="admin.php">返回</a>
        </div>
        <div class="col-md-9 mt20 ">
            <div class=" js-construct-show wid100 text-center">
                <table class="table table-bordered">
                    <tr>
                        <td>队名</td>
                        <td>队长</td>
                    </tr>
<?
require_once "config.inc.php";
$sql1="select * from season where state!=2";
$query=mysql_query($sql1) or die('sql1');
if($result=mysql_fetch_array($query)){
	$year=$result['year'];
	$sql2="select team.name,player.name from team,player where team.year='$year' and team.cap_id=player.id";
	$team=mysql_query($sql2) or die('sql2');
	while($t=mysql_fetch_row($team)){
		echo "<tr>";
		echo "<td>".$t[0]."</td>";
		echo "<td>".$t[1]."</td>";
		echo "</tr>";
	}
}else{
	echo "<script>alert('比赛已结束！请重新开启比赛！');location.href='admin_game.php';</script>";
}
?>
</table>
<?
if($result['state']==0){
	echo '<p class="text-center"><a href="match_start.php"><button class="btn btn-default">关闭报名并生成赛程表</button></a></p>';
}
?>                                
            </div>
        </div>
    </div>
</div>

<? include 'footer_admin.html'; ?>
</body>
</html>
