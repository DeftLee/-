<?
function season_jifen($tid){
		$win=0;$equal=0;$lost=0;$goal=0;$loss=0;//分别代表胜场、平场、负场、进球数、失球数计数器。
		$sqla="select * from game where taid='$tid' and state=1";
		$querya=mysql_query($sqla) or die(mysql_error());
		while($resulta=mysql_fetch_array($querya)){
			$goal=$goal+$resulta['tagoal'];
			$loss=$loss+$resulta['tbgoal'];
			if($resulta['tagoal']>$resulta['tbgoal']){
				$win++;
			}else if($resulta['tagoal']==$resulta['tbgoal']){
				$equal++;
			}else if($resulta['tagoal']<$resulta['tbgoal']){
				$lost++;
			}
		}
		$sqlb="select * from game where tbid='$tid' and state=1";
		$queryb=mysql_query($sqlb) or die(mysql_error());
		while($resultb=mysql_fetch_array($queryb)){
			$goal=$goal+$resultb['tbgoal'];
			$loss=$loss+$resultb['tagoal'];
			if($resultb['tagoal']<$resultb['tbgoal']){
				$win++;
			}else if($resultb['tagoal']==$resultb['tbgoal']){
				$equal++;
			}else if($resultb['tagoal']>$resultb['tbgoal']){
				$lost++;
			}
		}
		$advance=$goal-$loss;
		$game=$win+$equal+$lost;
		$point=$win*3+$equal;
		$sqlab="update jifen set win='$win',equal='$equal',lost='$lost',goal='$goal',loss='$loss',advance='$advance',game='$game',point='$point' where tid='$tid'";
		$queryab=mysql_query($sqlab) or die(mysql_error());
	}
?>