<?php 
# match the browser to the css file
$user_agent = $_SERVER['HTTP_USER_AGENT'];
#echo $_SERVER['HTTP_USER_AGENT'];
$cssOption="";
//Switch to the browser's CSS file
if(preg_match('/MSIE/i',$user_agent))   
{
    $cssOption='<link rel="stylesheet" type="text/css" href="../../CSSFiles/mainPageAlternate.css" />';
}
elseif(preg_match('/Chrome/i',$user_agent))
{
    $cssOption = '<link rel="stylesheet" type="text/css" href="../../CSSFiles/mainPage.css" />';
}
?>