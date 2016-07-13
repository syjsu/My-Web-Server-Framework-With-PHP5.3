<?php
//error handler function
function customError($errno, $errstr, $errfile, $errline){ 
    echo "<b>Custom error:</b> [$errno] $errstr<br />";
    echo " Error on line $errline in $errfile<br />";
    echo "Ending Script";
    die();
}

//set error handler
set_error_handler("customError");
$test=2;
//trigger error
if ($test>1){
    trigger_error("A custom error has been triggered");
}
?>