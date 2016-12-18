<?php
session_start();
include 'header.html';
?>
<BODY>
<?php
    require_once "config.inc.php";
    $user = $_POST['user'];
	$key=$_POST['password'];
    $query = "select * from author where user='$user' and pw='$key';";
    $result = mysql_query($query);
    $count = mysql_num_rows($result);
    if ($count == 0) {
        echo "密码或用户名错误，页面将在3秒后返回主页面，请重试！";
        echo " <meta http-equiv=\"refresh\" content=\"3; url=login.html\" />";
    } else {
		$re = mysql_fetch_array($result) or die(mysql_error());
        $_SESSION['name'] = $re['name'];
		$_SESSION['right']=$re['right'];
		$_SESSION['id']=$re['id'];
		switch($re['right']){
			case 0:echo " <meta http-equiv=\"refresh\" content=\"0; url=admin.php\" />";break;
			case 1:echo " <meta http-equiv=\"refresh\" content=\"0; url=captain.php\" />";break;
		}        
    }
    mysql_close($hd);
?>
</BODY>
</html>