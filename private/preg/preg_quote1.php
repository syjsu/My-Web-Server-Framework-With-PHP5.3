<?php
// 本例中，preg_quote($word) 用来使星号不在正则表达式中
// 具有特殊含义。

$textbody = "This book is *very* difficult to find.";
$word = "*very*";
$textbody = preg_replace ("/".preg_quote($word)."/",
                          "<i>".$word."</i>",
                          $textbody);
echo $textbody;
?> 