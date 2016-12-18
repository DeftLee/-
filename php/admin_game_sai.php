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
            <a class="btn btn-info block mt20  wid50 dblue" href="admin_game_saig.php">赛事登记</a>
            <a class="btn btn-info block mt20  wid50" href="admin_game_guan.php">比赛汇总</a>
            <a class="btn btn-info block mt20  wid50" href="admin.php">返回</a>
        </div>
        <div class="col-md-9 ">

            <div class="js-construct-show wid100">

                <form class="form-inline mb20 text-center" action="game_insert.php" method="post">
                    <div class="form-group mr50">
                        <h3 class="fl mr20">比分 :</h3>
                        <div class="fr font22">
<?
$gid=$_GET['gid'];
require_once 'config.inc.php';
$sql1="select * from game where id='$gid' ";
$query1=mysql_query($sql1) or die(mysql_error());
if($game=mysql_fetch_array($query1)){
	switch($game['state']){
		case 0:
		echo '<input type="hidden" name="gid" value="'.$gid.'">';		
		echo '<p>'.$game['taname'].'<input type="text" name="tagoal" /></p>';
		echo '<p>'.$game['tbname'].'<input type="text" name="tbgoal" /></p>';
		break;
		case 1:
		echo '<input type="hidden" name="gid" value="'.$gid.'">';
		echo '<p>'.$game['taname'].'<input type="text" name="tagoal" value="'.$game['tagoal'].'"/></p>';
		echo '<p>'.$game['tbname'].'<input type="text" name="tbgoal" value="'.$game['tbgoal'].'"/></p>';
		break;
	}
	
}
?>                                                     
                        </div>
                    </div><p class="text-center"><button class="btn btn-success">提交赛果</button></p>
                    </form>         
					
					</div>
        </div>
    </div>
</div>

<? include 'footer_admin.html'; ?>
<script src="js/admin-game.js"></script>
<script>
    $(".datepick").datetimepicker({
        format: 'Y-m-d'
    });
</script>
</body>
</html>
