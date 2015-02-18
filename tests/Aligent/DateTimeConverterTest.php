<?php

class DateTimeConverterTest extends PHPUnit_Framework_TestCase
{



public function testNumberOfDays()
{

$this->assertEquals(17, Aligent\DateTimeConverter::getNumberOfDays('1/02/2015','18/02/2015'));

//testign leap year

 $this->assertEquals((5*365)+1, Aligent\DateTimeConverter::getNumberOfDays('1/02/2010','1/02/2015'));
}

public function testNumberOfDaysInSeconds()
{

    $this->assertEquals(17 * 86400, Aligent\DateTimeConverter::getNumberOfDays('1/02/2015','18/02/2015', Aligent\DateTimeConverter::SECONDS));

    $this->assertEquals(1305 * 86400, Aligent\DateTimeConverter::getNumberOfWeekdays('1/02/2010','1/02/2015', Aligent\DateTimeConverter::SECONDS));


}

 public function testNumberOfWeekDays()
 {

        $this->assertEquals(12, Aligent\DateTimeConverter::getNumberOfWeekdays('1/02/2015','18/02/2015'));

        //for five year period
       $this->assertEquals(1305, Aligent\DateTimeConverter::getNumberOfWeekdays('1/02/2010','1/02/2015'));

 }

public function testNumberOfWeekDaysInSecocnds()
{

    $this->assertEquals(12 * 86400, Aligent\DateTimeConverter::getNumberOfWeekdays('1/02/2015','18/02/2015', Aligent\DateTimeConverter::SECONDS));

}


public function testNumberOfWeekDaysInHours()
{

    $this->assertEquals(288, Aligent\DateTimeConverter::getNumberOfWeekdays('1/02/2015','18/02/2015', Aligent\DateTimeConverter::HOURS));

}

public function testNumberOfYears()
{

    $this->assertEquals(5, Aligent\DateTimeConverter::getNumberOfDays('1/02/2010','1/02/2015',  Aligent\DateTimeConverter::YEARS));

}


// ...etc
}

?>

