<?php
//$from_Currency = "USD";
//$to_Currency = "INR";
$encode_amount = $_REQUEST["encode_amount"];
$from_Currency="INR";
$to_Currency=$_REQUEST["to"];
$get = file_get_contents("https://www.google.com/finance/converter?a=$encode_amount&from=$from_Currency&to=$to_Currency");
$get = explode("<span class=bld>",$get);
$get = explode("</span>",$get[1]);
$converted_currency = preg_replace("/[^0-9\.]/", null, $get[0]);


echo $converted_currency;
?>