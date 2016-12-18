<div class="overhide bg9">
    <p class="pull-right mr50">
        <span>你好，
		<? switch($_SESSION['right']){
			case 0:echo $_SESSION['name'].'！';break;
			case 1:echo $_SESSION['name'].' 队长！';break;
		}  ?>
		</span> | 
        <a href="exit.php">退出登录</a>
    </p>
</div>