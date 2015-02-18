<?php
require_once('Aligent\DateTimeConverter.php');

$date1 = '1/02/2015';
$date2 = '18/02/2015';

echo "Date1: ".$date1.'<br>'.PHP_EOL;
echo "Date2: ".$date2.'<br>'.PHP_EOL;

echo '<br>'.PHP_EOL;;
echo '<br>'.PHP_EOL;;


echo  "Number Of Days :".Aligent\DateTimeConverter::getNumberOfDays($date1,$date2) .'<br>'.PHP_EOL;

echo  "Number Of Days In Seconds:".Aligent\DateTimeConverter::getNumberOfDays($date1,$date2, Aligent\DateTimeConverter::SECONDS) ."<br>".PHP_EOL;

echo '<br>'.PHP_EOL;;
echo '<br>'.PHP_EOL;;

echo  "Number Of Working Days:". Aligent\DateTimeConverter::getNumberOfWeekdays($date1,$date2) ."<br>".PHP_EOL;

echo  "Number Of Working Days In Seconds:". Aligent\DateTimeConverter::getNumberOfWeekdays($date1,$date2,  Aligent\DateTimeConverter::SECONDS) ."<br>".PHP_EOL;

echo '<br>'.PHP_EOL;;
echo '<br>'.PHP_EOL;;

echo  "Number Of Weeks". Aligent\DateTimeConverter::getNumberOfWeeks($date1,$date2) ."<br>".PHP_EOL;
echo  "Number Of Weeks  In Seconds:". Aligent\DateTimeConverter::getNumberOfWeeks($date1,$date2, Aligent\DateTimeConverter::SECONDS) ."<br>".PHP_EOL;

?>

