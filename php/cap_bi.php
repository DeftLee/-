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
<div class="container"  style="min-height:570px;">
    <div class="row">
        <div class="col-md-3 mt20">
            <a class="btn btn-info block mt20 js-intro wid50" href="cap_bao.php">比赛报名</a>
            <a class="btn btn-info block mt20 js-culture wid50" href="cap_dui.php">队员查看</a>
            <a class="btn btn-info block mt20 js-construct wid50 dblue" href="cap_bi.php">比赛情况</a>
            <a class="btn btn-info block mt20 js-contact wid50" href="cap_qiu.php">球队新闻管理</a>
            <a class="btn btn-info block mt20 js-news wid50" href="cap_fa.php">发布球队新闻</a>
            <a class="btn btn-info block mt20 js-contact wid50" href="index.php">返回足协官网</a>
        </div>
        <div class="col-md-9 mt20 ">

            <div class=" js-culture-show wid100 text-center">              
                </select></p>
                <table class="text-center table table-bordered">
                    
                    <tbody>
                    <tr>
                        <td>场次</td>
                        <td>比赛情况</td>
						<td>比赛状态</td>
                    </tr>
<?
require_once 'config.inc.php';
$sql1="select year,state from season order by id desc" ;
$query1=mysql_query($sql1) or die(mysql_error());
if($result=mysql_fetch_array($query1)){
	$year=$result['year'];
	$state=$result['state'];
	$i=1;
	$sch_id=$_SESSION['id'];
	if($state==0){
			echo "比赛报名中，请耐心等待报名结束后的赛程安排";
	}else{
		$sql="select * from game,team where game.year='$year' and team.school_id='$sch_id' and (taid=team.id or tbid=team.id)";
		$query=mysql_query($sql) or die(mysql_error());
		while($game=mysql_fetch_array($query)){
			echo "<tr>";
			echo "<td>".$i."</td>";
			switch($game['state']){
				case 0:
				echo "<td>".$game['taname']." vs ".$game['tbname']."</td>";
				echo "<td>未进行</td>";
				break;
				case 1:
				echo "<td>".$game['taname'].$game['tagoal']." : ".$game['tbgoal'].$game['tbname']."</td>";
				echo "<td>已结束</td>";
				break;
			}				
			echo "</tr>";
			$i++;
		}
	}
}else{
	echo "暂无赛事历史纪录，请创建新赛事！";
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
