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
<div class="container " style="min-height:570px;">
    <div class="row">
        <div class="col-md-3 mt20">
            <a class="btn btn-info block mt20 js-intro wid50 dblue" href="cap_bao.php">比赛报名</a>
            <a class="btn btn-info block mt20 js-culture wid50" href="cap_dui.php">队员查看</a>
            <a class="btn btn-info block mt20 js-construct wid50" href="cap_bi.php">比赛情况</a>
            <a class="btn btn-info block mt20 js-contact wid50" href="cap_qiu.php">球队新闻管理</a>
            <a class="btn btn-info block mt20 js-news wid50" href="cap_fa.php">发布球队新闻</a>
            <a class="btn btn-info block mt20 js-contact wid50" href="index.php">返回足协官网</a>
        </div>
        <div class="col-md-9 mt20 ">
            <div class="js-intro-show wid100 text-center">
<?  require_once "config.inc.php";
	$query = "select * from season order by id desc";
	$result = mysql_query($query)or die(mysql_error());
	if($re = mysql_fetch_array($result)){
		$year=$re['year'];
		$school_id=$_SESSION['id'];
		if($re['state']!=0){
			switch($re['state']){
				case 1:echo '<p style="font-size:22px;">'.$year.'赛季进行中！你可以点击左边导航按钮查看本学院参赛队员'."</p>";break;
				case 2:echo '<p style="font-size:22px;">'.$year.'赛季已结束！你可以点击左边导航按钮查看本学院球队战绩'."</p>";break;
			}
		}else{
			$query1="select * from team where year='$year' and school_id='$school_id'";
			$result1=mysql_query($query1)or die(mysql_error());
			if($team = mysql_fetch_array($result1)){
				echo "本队已报名，请点击“队员查看”查看队员!";
			}else{
				echo '<form action="insert_player.php?" method="post"><table class="table table-bordered wid100 text-center table-add-tr"><thead><tr>';
				echo '<td>号码</td><td>姓名</td><td>班级</td><td>是否队长</td></tr></thead><tbody>';
				for($i=0;$i<$re['player_num'];$i++){
					echo '<tr><td><input type="text" name="pno[]" /></td>';
					echo '<td><input type="text" name="name[]" /></td>';
					echo '<td><input type="text" name="class[]" /></td>';
					echo '<td><input type="radio" name="teamleader" value='.$i.' /></td></tr>';
					}
				echo '</tbody></table><p class="mt50 text-center"><input type="submit" value="提交" /></p></form>'; 
			}			              
		}
	}else{
		echo "现在还没有历史赛事记录，请创建新赛事！";
	}
?>
                
            </div>
        </div>
    </div>
</div>

<? include 'footer_admin.html'; ?>
</body>
</html>