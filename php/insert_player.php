<?
include 'session_captain.php';
include 'header.html'; 

$pno=$_POST['pno'];
$name=$_POST['name'];
$class=$_POST['class'];
$team_name=$_SESSION['name'];
$school_id=$_SESSION['id'];

require_once "config.inc.php";
$sql1="select * from season where state=0 order by id desc";
$query1=mysql_query($sql1)or die('sql1');
$result=mysql_fetch_array($query1);
$year=$result['year'];

$sql2="insert into team (name,school_id,year) value ('$team_name','$school_id','$year')";
$query2=mysql_query($sql2) or die('sql2');
$sql3="select id from team where name='$team_name' and school_id='$school_id' and year='$year'";
$query3=mysql_query($sql3)or die('sql3');
if($re=mysql_fetch_array($query3)){
	$tid=$re['id'];
}
$i=0;
while($pno[$i] && $name[$i] && $class[$i]){
	$p= $pno[$i];
	$n= $name[$i];
	$c= $class[$i];
	if($i==$_POST['teamleader']) {$leader=1;}
	else{ $leader=0;}
	$sql="INSERT INTO player (name,pno,tid,is_leader,class,year) VALUES ('$n', '$p', '$tid', '$leader', '$c', '$year')";
	$query=mysql_query($sql)or die(mysql_error());
	$i++;
}
$sql4="select id from player where year='$year' and tid='$tid' and is_leader=1 ";
$query4=mysql_query($sql4)or die('sql4');
$r=mysql_fetch_array($query4);
$cap_id=$r['id'];
echo $cap_id;
$sql5="update team set cap_id='$cap_id' where id='$tid'";
$query5=mysql_query($sql5)or die('sql5');
echo "<script>location.href='cap_dui.php';</script>";
?>