<?php
	function drawBarDiv($percent, $type){
		echo '<div class="progress"><div class="progress-bar inline-block" data="' . $percent . '" type="' . $type . '" title="' . strtoupper($type) . ' Percentage Use: ' . $percent . '%"></div></div>';
	}
?>
