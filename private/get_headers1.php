<?php
$url = 'http://www.tushucheng.com/book/1200502.html';
if (get_headers($url)<>false)
{
   echo "文件存在";
}
 else
 {
   echo "文件不存在";
 }
//print_r(get_headers($url, 1));
?>