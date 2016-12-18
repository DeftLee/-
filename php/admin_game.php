<?php
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
            <a class="btn btn-info block mt20 wid50 dblue" href="admin_game.php">开启比赛</a>
            <a class="btn btn-info block mt20  wid50" href="admin_bao.php">报名管理</a>
            <a class="btn btn-info block mt20  wid50" href="admin_game_saig.php">赛事管理</a>
            <a class="btn btn-info block mt20  wid50" href="admin_game_guan.php">比赛汇总</a>
            <a class="btn btn-info block mt20  wid50" href="admin.php">返回</a>
        </div>
        <div class="col-md-9 mt20 ">
            <div class="js-culture-show wid100  text-center">

                <form class="form-horizontal mb20" action="season_start.php" method="post">					
                    <div class="form-group mr50">					
                        <label for="people" class="gray mr20 col-md-3 control-label">每队人数</label>
                        <div class="col-md-4">
                            <select class="form-control" id="people" name="player_num">
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
								<option>11</option>
								<option>12</option>
								<option>13</option>
								<option>14</option>
								<option>15</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group mr50">
                                            <label for="sy" class="gray mr20 col-md-3 control-label">赛季年份</label>
                                            <div class="col-md-4">
                                                <input type="text" name="year" class=" wid50 form-control" id="sy">
                                            </div>
                                        </div>
                    <p class="mt20"><button class="btn btn-default btn-sm">确认并开启报名</button></p>
                </form>
            </div>

        </div>
    </div>
</div>

<? include 'footer_admin.html'; ?>
</body>
</html>
