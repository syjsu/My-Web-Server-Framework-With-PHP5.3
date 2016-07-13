<?php
preg_match_all ("/<[^>]+>(.*)<\/[^>]+>/U",
    "<b>example: </b><div align=left>this is a test</div>",
    $out, PREG_SET_ORDER);
    var_dump($out);
print $out[0][0].", ".$out[0][1]."\n";
print $out[1][0].", ".$out[1][1]."\n";
?> 