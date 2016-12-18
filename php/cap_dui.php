<? 
include 'session_captain.php';
include 'header.html'; 
?>
<body>
<? include 'div_logout.php'; ?>
<nav class="navbar navbar-default  navbar-inverse" role="navigation">
    <div class="container" >
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
<div class="container "style="min-height:570px;">
    <div class="row">
        <div class="col-md-3 mt20">
            <a class="btn btn-info block mt20 js-intro wid50" href="cap_bao.php">比赛报名</a>
            <a class="btn btn-info block mt20 js-culture wid50 dblue" href="cap_dui.php">队员查看</a>
            <a class="btn btn-info block mt20 js-construct wid50" href="cap_bi.php">比赛情况</a>
            <a class="btn btn-info block mt20 js-contact wid50" href="cap_qiu.php">球队新闻管理</a>
            <a class="btn btn-info block mt20 js-news wid50" href="cap_fa.php">发布球队新闻</a>
            <a class="btn btn-info block mt20 js-contact wid50" href="index.php">返回足协官网</a>
        </div>
        <div class="col-md-9 mt20 ">
            <div class="js-culture-show wid100 text-center">
                <p style="font-size:20px;" class="mb20">队员查看</p>
                <table class="text-center table table-bordered">
                    <thead>
                    <tr>
                        <td>号码</td>
                        <td>姓名</td>
                        <td>班级</td>
                        <td>队长</td>
                    </tr>
                    </thead>
                    <tbody>
<?
$school_name=$_SESSION['name'];
require_once "config.inc.php";
$sql1= "select * from season order by id DESC";
$result1 = mysql_query($sql1) or die('sql1');
if($re1 = mysql_fetch_array($result1)){
	$year=$re1['year'];
}else{
	die('loss year...');
}
$sql2="select player.name,player.pno,player.class,player.is_leader from player,team where player.year='$year' and player.tid=team.id and team.name='$school_name'";
$result2 = mysql_query($sql2) or die($year.$school_name.'sql2');
while($player=mysql_fetch_array($result2)){
	echo "<tr>";
	echo "<td>".$player['pno']."</td>";
	echo "<td>".$player['name']."</td>";
	echo "<td>".$player['class']."</td>";
	switch($player['is_leader']){
		case 0:echo "<td></td>";break;
		case 1:echo "<td>是</td>";break;
	}
	echo "</tr>";
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
