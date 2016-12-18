<?php
session_start();
session_unset();
session_destroy() ;
include 'header.html';
?>
<meta http-equiv="refresh" content="2; url=index.php" />
3秒后退出....