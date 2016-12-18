<? include 'header.html'; ?>
<body>
<? include 'div_login.html'; ?>
<div style="width:90%;margin:0 auto;background:white">
<div class="meun">
		<div class="meun_bg"></div>
		<ul>
			<li><a href="index.php"><span>首页</span></a></li>
			<li><a href="game.php"><span>比赛</span></a></li>
			<li><a href="news.php"><span>新闻</span></a></li>
			<li><a href="team.php"><span>球队</span></a></li>
			<li class="current"><a href="about.php"><span>关于</span></a></li>
		</ul>
	</div>
	<div class="text-center mt20">
            <img src="http://s.csbew.com/creative/u18913/38859/tlunahts.rnj_2016115.jpg" alt="5U球迷联盟APP">
            </div>
<div class="container f5" style="min-height:400px;">
    <div class="row" style="height:300px;">
        <div class="col-xs-2 " style="background:white;height:100%">
            <button class="btn  block mt20 js-intro" style="background-color:orange;font-size:20px;color:white;font-weight:700;">足协介绍</button>
            <button class="btn  block mt20 js-culture" style="background-color:orange;font-size:20px;color:white;font-weight:700;">足协展望</button>
            <button class="btn  block mt20 js-contact" style="background-color:orange;font-size:20px;color:white;font-weight:700;">联系我们</button>
        </div>
        <div class="col-xs-9  col-xs-offset-1" style="background:white;height:100%">
            <div class="js-intro-show">
                <h4 class="text-center" style="font-weight:bold;color:orange;line-height:30px;padding-bottom:8px;border-bottom:2px solid #ccc;">足协介绍 <span class="glyphicon glyphicon-volume-up" style="color:orange"></span></h4>
                <p style="line-height:40px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;广东外语外贸大学足球协会创建于1999年，目前会员已超过200名，它是一个为足球爱好者搭建的平台，协会致力于推广快乐足球文化，一直努力做好每一个活动，已成功举办“广外杯”足球赛，三人足球赛赛等传统比赛项目。10-11年度，协会创办了首届足协联赛。此外，足协球迷部还未会员提供了一系列的福利，例如优惠购买广州恒大比赛门票，组织看恒大训练，零距离接触恒大球员，还可以与球员合照留念，获得亲笔签名等。无论你是喜欢踢球，还是喜欢看球赛，只要你热爱足球，我们都期待你成为足协大家庭的一员。</p>
            </div>
            <div class="f-hide js-culture-show">
                <h4 class="text-center" style="font-weight:bold;color:orange;line-height:30px;padding-bottom:8px;border-bottom:2px solid #ccc;">足球展望 <span class="glyphicon glyphicon-eye-open" style="color:orange"></span></h4>
                <p style="line-height:40px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;足球是不仅是一项快乐的运动，而且是一种文化，一种信仰，所以说喜欢足球，我们就不仅喜欢同一项运动，而且认同同一种文化，相信同一种信仰。举办各类的足球比赛，对于不了解足球的人，可以让他们体会足球这项运动的魅力，让他们喜欢上足球；对于喜欢足球的人来说，这不仅是一个自己家的盛事，能拉进我们的距离，更能加强校内的足球气氛，广外所有足球人都希望，广外能够有越来越好，越来越浓重的足球氛围。
最后，如果你喜欢足球，希望广外足球越来越好，欢迎加入我们的行列，支持我们的活动；如果你并不了解足球，同样也欢迎你的加入，在这里我们会让你体会足球的魅力，了解足球文化，领略足球的信仰，爱上足球这项运动！！！</p>
            </div>
            <div class="f-hide js-contact-show">
                <h4 class="text-center" style="font-weight:bold;color:orange;line-height:30px;padding-bottom:8px;border-bottom:2px solid #ccc;">联系我们 <span class="glyphicon glyphicon-earphone" style="color:orange"></span></h4>
<?php
			require_once "config.inc.php";
			$query = "select * from contact";
			$result = mysql_query($query);
			while($re = mysql_fetch_array($result)){
				echo "<div style='padding:20px 20px;background:orange;border-radius:50px;font-size:16px;'><p>联系人：".$re['name']."(".$re['title'].")"."</p><br />";
				echo "<p>联系方式：".$re['phone']."</p></div>";
				echo "<br />";
			}
?>
            </div>
        </div>
    </div>
</div>
</div>
<? include 'footer.html'; ?>
<script src="js/about.js"></script>
</body>
</html>
