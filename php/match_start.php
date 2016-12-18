<?
include 'session_admin.php';
include 'header.html';

include 'header.html';
echo "正在生成赛程表。。。";

require_once 'config.inc.php';
$sql1="select id,year from season where state=0 ";
$query1=mysql_query($sql1) or die('sql1');
if($re=mysql_fetch_array($query1)){
	$year=$re['year'];
	$id=$re['id'];
}
$sql2="select id,name from team where year=$year";
$query2=mysql_query($sql2) or die('sql2');
$i=0;
while($teams=mysql_fetch_array($query2)){
	$tid[$i]=$teams['id'];
	$tname[$i]=$teams['name'];
	$i++;
};
for($j=0;$j<$i;$j++){
	$sql4="insert into jifen (tid, year) value ('$tid[$j]', '$year' )";
	$update=mysql_query($sql4) or die(mysql_error());
	for($k=0;$k<$j;$k++){
		$ta=$tid[$j];$taname=$tname[$j];
		$tb=$tid[$k];$tbname=$tname[$k];
		$sql="insert game (taid,taname,tbid,tbname,year) value ('$ta','$taname','$tb','$tbname','$year' ) ";
		$insert=mysql_query($sql) or die(mysql_error());
	}
}
$sql3="update season set state='1' where id='$id'";
$update=mysql_query($sql3) or die(mysql_error());

echo "<script>alert('生成赛程表成功！');location.href='admin_game_saig.php';</script>";
?>