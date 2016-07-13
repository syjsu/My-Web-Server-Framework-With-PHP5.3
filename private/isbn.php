<?php
	$isbn = '9787121211';
	if(preg_match('/^([0-9]{10})$/',$isbn)){
		echo 'is isbn';
	}else{
		echo 'not isbn';
	}
?>