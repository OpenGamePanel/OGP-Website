<?php
function print_player_list_gameq($player_list,$numplayers,$numplayersmax)
{
	$tdcount = 0;
	$maxcount = 0;
	$maxid = 0;
	$max = 0;
	
    $data =  "<table class='player_monitor'>";
	$data .= "<thead><tr>";
	foreach($player_list as $id => $player)
	{
		$maxcount = 0;
		foreach($player as $td => $column)
		{
			if($column != null)
			{
				$sub = substr($td,0,3);
				if($td == 'time' || $td == 'gq_time'){
					$time = $player['time'];
					$hours = ((int)($time/3600));
					$mins = ((int)($time/60))-($hours*60);
					$secs = ((int)($time)) - ($mins*60) - ($hours*3600);	
					if ($hours <= 9) $hours= "0".$hours;
					if ($mins <= 9) $mins= "0".$mins;
					if ($secs <= 9) $secs= "0".$secs;
					$player_list[$id][$td] = @$hours.":".@$mins.":".@$secs;
				}	
				if($sub == "gq_"){
					$player_list[$id][substr($td,3)] = $column;
					unset($player_list[$id][$td]);
				}
			}
			else
				unset($player_list[$id][$td]);
			if(isset($player_list[$id][$td]))
				$maxcount++;
		}
		if($max < $maxcount)
		{
			$max = $maxcount;
			$maxid = $id;
		}
	}

	foreach($player_list[$maxid] as $td => $column)
	{
		if($column != "" )
		{
			if($td == "name") $td = "player_name";
			$data .= "<th>".get_lang($td)."</th>";
			$tdcount++;
		}
	}
	$data .= "</tr></thead>";
	$data .= "<tbody>";
    foreach ( $player_list as $player ){
		$data .= "<tr>";
		foreach($player_list[$maxid] as $maxtd => $maxcolumn)
		{
			if(isset($player[$maxtd]))
				$data .= "<td>".htmlentities($player[$maxtd])."</td>";
			else
				$data .= "<td> </td>";
		}
		$data .= "</tr>";
    }
	$data .= "</tbody><tfooter><tr><td colspan='".$tdcount."'>".get_lang('players').": " . $numplayers."/".$numplayersmax . "</td></tr>";
    $data .= "</tfooter></table>";
	return $data;
}
?>
