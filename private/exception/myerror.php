<?php
	sae_set_display_errors(TRUE);
	function newerror($errorno,$errorstr){
		echo  $errorno.'  '.$errorstr;
	}
	
	set_error_handler(newerror);
	
	$test = 2;
	if($test >= 1){
		trigger_error('yes some error happen!');
	}
?>