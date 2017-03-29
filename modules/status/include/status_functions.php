<?php
	function drawBarDiv($percent, $type){
		$percent = round($percent, 2); // Round it to two decimal places
		echo '<div class="progress"><div class="progress-bar inline-block" data="' . $percent . '" type="' . $type . '" title="' . strtoupper($type) . ' Percentage Use: ' . $percent . '%"></div></div>';
	}
?>
