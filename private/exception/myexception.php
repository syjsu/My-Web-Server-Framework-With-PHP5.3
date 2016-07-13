<?php 
	function myexception($e){
		echo "<b>Exception</b><br/>";
		echo "file:".$e->getFile()."<br/>";
		echo "line:".$e->getLine()."<br/>";
		var_dump($e->getTrace());
		echo "<br/>";
		echo "message:".$e->getMessage()."<br/>";
	}
	set_exception_handler(myexception);
	
	$sql = 'select * from table!';
	if(1){
		throw  new Exception("you have some error in your sql:$sql");
	}
	
?>