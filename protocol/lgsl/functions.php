<?php
function print_player_list($player_list,$players,$playersmax)
{
    $data =  "<table class='player_monitor' style='border:none;'><thead>";
    $data .= "<tr><th>".get_lang('player_name')."</th><th>".get_lang('score')."</th><th>".get_lang('time')."</th></tr>";
	$data .= "</thead><tbody>";
	foreach ($player_list as $key => $row) {
		$name[$key] = $row['name'];
		$score[$key] = $row['score'];
		$time[$key] = $row['time'];

	}
	//Sort by score, the 1st position in this array multisort, score, defines the row that sorts the array, if there are two equal scores then the next row, time, will sort this array.
	array_multisort($score, SORT_DESC,
					$time,
					$name, $player_list);
	$i = 0;
    foreach( $player_list as $player ){
		$data .= "<tr";
		if($i%2 == 0) $data .= 'class="odd"';
		$data .="><td>".htmlentities(@$player['name'])."</td><td>".@$player['score']."</td><td>".@$player['time']."</td></tr>";
		$i++;
	}
	$data .= "</tbody><tfooter><tr><td colspan='3'>".get_lang('players').": " . $players."/".$playersmax . "</td></tr>";
    $data .= "</tfooter></table>";
	return $data;
}
?>
