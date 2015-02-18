<?php
require_once('Aligent\DateTimeConverter.php');


echo  "Number Of Days :".Aligent\DateTimeConverter::getNumberOfDays('1/02/2010','1/02/2015') .'<br>';

echo  "Number Of Days In Seconds:".Aligent\DateTimeConverter::getNumberOfDays('1/02/2015','18/02/2015', Aligent\DateTimeConverter::SECONDS) ."<br>";



echo  "Number Of Working Days:". Aligent\DateTimeConverter::getNumberOfWeekdays('1/02/2010','1/02/2015') ."<br>";

echo  "Number Of Working Days In Seconds:". Aligent\DateTimeConverter::getNumberOfWeekdays('1/02/2015','18/02/2015',  Aligent\DateTimeConverter::SECONDS) ."<br>";



echo  "Number Of Weeks". Aligent\DateTimeConverter::getNumberOfWeeks('1/02/2015','18/02/2015') ."<br>";

echo  "Number Of Weeks  In Seconds:". Aligent\DateTimeConverter::getNumberOfWeeks('1/02/2015','18/02/2015', Aligent\DateTimeConverter::SECONDS) ."<br>";

?>

