<? 
include 'session_admin.php';
include 'header.html';

$tagoal=$_POST['tagoal'];
$tbgoal=$_POST['tbgoal'];
$gid=$_POST['gid'];
require_once 'config.inc.php';
$sql="update game set tagoal='$tagoal',tbgoal='$tbgoal',state='1' where id='$gid'";
$update=mysql_query($sql) or die(mysql_error());
if($re=mysql_affected_rows()){
	$sqlab="select taid,tbid from game where id='$gid'";
	$query=mysql_query($sqlab) or die("1".mysql_error());
	if($getid=mysql_fetch_array($query)){
		$taid=$getid['taid'];
		$tbid=$getid['tbid'];
		include 'season_jifen.php';
		season_jifen($taid);
		season_jifen($tbid);
		echo "<script>alert('记录比赛成功！');location.href='admin_game_saig.php';</script>";
}else{
	echo "<script>alert('记录比赛失败！');location.href='admin_game_sai.php?gid=$gid';</script>";
	}
}
?>