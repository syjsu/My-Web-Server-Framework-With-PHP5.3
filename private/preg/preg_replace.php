<?php
$string = "April 15, 2003";
$pattern = "/(w+) (d+), (d+)/";
$replacement = "/${1}1,/$3";
print preg_replace($pattern, $replacement, $string);

/* Output
   ======

April1,2003

*/
?>