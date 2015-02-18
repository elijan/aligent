<?php
require_once('Aligent\DateTimeConverter.php');

$date1 = '1/02/2010';
$date2 = '1/02/2015';

echo "Date1: ".$date1.PHP_EOL;
echo "Date2: ".$date2.PHP_EOL;

echo PHP_EOL;
echo PHP_EOL;


echo  "Number Of Days :".Aligent\DateTimeConverter::getNumberOfDays('1/02/2015','1/02/2015') .'<br>'.PHP_EOL;

echo  "Number Of Days In Seconds:".Aligent\DateTimeConverter::getNumberOfDays('1/02/2015','18/02/2015', Aligent\DateTimeConverter::SECONDS) ."<br>".PHP_EOL;

echo PHP_EOL;
echo PHP_EOL;

echo  "Number Of Working Days:". Aligent\DateTimeConverter::getNumberOfWeekdays('1/02/2010','1/02/2015') ."<br>".PHP_EOL;

echo  "Number Of Working Days In Seconds:". Aligent\DateTimeConverter::getNumberOfWeekdays('1/02/2015','18/02/2015',  Aligent\DateTimeConverter::SECONDS) ."<br>".PHP_EOL;

echo PHP_EOL;
echo PHP_EOL;

echo  "Number Of Weeks". Aligent\DateTimeConverter::getNumberOfWeeks('1/02/2015','18/02/2015') ."<br>".PHP_EOL;
echo  "Number Of Weeks  In Seconds:". Aligent\DateTimeConverter::getNumberOfWeeks('1/02/2015','18/02/2015', Aligent\DateTimeConverter::SECONDS) ."<br>".PHP_EOL;

?>

