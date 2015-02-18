<?php

namespace Aligent;


class DateTimeConverter  {


    const SECONDS = 'S';
    const MINUTES = 'M';
    const HOURS = 'H';
    const YEARS = 'Y';
    const DATE_FORMAT = 'd/m/Y';


    const TIMEZONE_DATE1 = 'Australia/Adelaide';
    const TIMEZONE_DATE2 = 'Australia/Adelaide';
    

    /**
     * @param $date1
     * @param $date2
     * @param null $output_format
     *
     * @return int
     *
     */
    public static function getNumberOfDays($date1, $date2,  $output_format = null){

        self::checkDateFormat($date1, $date2);


        $startDate = self::getDateTime($date1, new \DateTimeZone(self::TIMEZONE_DATE1));
        $endDate = self::getDateTime($date2, new \DateTimeZone(self::TIMEZONE_DATE2));



        $days = $endDate->diff($startDate)->days;

        return self::formatDays($days, $output_format);



    }

    /**
     * @param $date1
     * @param $date2
     * @param String $output_format
     * @return integer
     *
     * Returns Number of Working Days by calculating the intervals
     */
    public static function getNumberOfWeekdays($date1, $date2,  $output_format = null){

        self::checkDateFormat($date1, $date2);

        $startDate = self::getDateTime($date1, new \DateTimeZone(self::TIMEZONE_DATE1));
        $endDate = self::getDateTime($date2, new \DateTimeZone(self::TIMEZONE_DATE2));



        $days = $endDate->diff($startDate)->days;

        //calculates the periods betwen dates based on the interval (P1D days)
        $period = new \DatePeriod($startDate, new \DateInterval('P1D'), $endDate);

        if($period) {

            foreach($period as $dt) {

                $currentDate = $dt->format('D'); //check what day it is

                // if Saturday or Sunday
                if ($currentDate == 'Sat' || $currentDate == 'Sun') {
                    $days--;
                }
            }

            return self::formatDays($days, $output_format);
        }


        return 0;

    }


    /**
     * @param $date1
     * @param $date2
     * @param null $output_format
     * @return int
     *
     * Retunrn number of weeks for given date range
     */
    public static function getNumberOfWeeks($date1, $date2, $output_format = null){

        $startDate = self::getDateTime($date1, new \DateTimeZone(self::TIMEZONE_DATE1));
        $endDate = self::getDateTime($date2, new \DateTimeZone(self::TIMEZONE_DATE2));

        //check the start date number in teh week
        // fromat 1 to 7 = MOn to Sun
        $currentStartDate = $startDate->format('N');
        $currentEndDate = $endDate->format('N');



        if($currentStartDate!=1){//if it is not monday

            if($currentStartDate==7){ //if it is sunday, move one day to be monday;
                $datemodifer = 1;
            }else{

                $datemodifer =  (8- $currentStartDate);
            }
            //move to next week
            $startDate->modify('+'.($datemodifer) .' days');
        }

        // is one week Mon to Sunday, or Monday to Monday?

        // Assumption
        //Monday to Monday
        if($currentEndDate!=1){

            $endDate->modify('-'.($currentEndDate-1) .' days');

        }

        //calculates the periods based on inteval (7 days)

        $period = new \DatePeriod($startDate, new \DateInterval('P7D'), $endDate);

        //i there is aormt, parse the period (number o weeks) as days
        if($output_format){
            return self::formatDays(iterator_count($period) * 7, $output_format);
        }

        //otherwise return count of weeks
        return iterator_count($period);

    }


    /**
     *
     * We put date tiem creation  in separe function
     * so that if modifcaiton is needed we chnage only this functiuon
     *
     * @param $date
     * @param bool $timezone
     * @return \DateTime
     */
    private function getDateTime($date, $timezone= false){

        if($timezone){

            return \DateTime::createFromFormat(self::DATE_FORMAT,$date, $timezone);
        }

        return \DateTime::createFromFormat(self::DATE_FORMAT,$date);

    }


    /**
     *
     * @param $days
     * @param $output_format
     * @return mixed
     *
     * Formats Days in fomrta specied in inoput
     */

    private static function formatDays($days, $output_format){

        $output = $days;

        switch($output_format){

            case self::SECONDS:

                $output =  $days * 86400;

                break;

            case self::MINUTES:

                $output =  $days * 3600;

                break;

            case self::HOURS:

                $output =  $days * 24;

                break;

            case self::YEARS:

                $output =  floor($days/365);


             break;


        }


        return $output;


    }


    private static function checkDateFormat($date1, $date2){

        //if date format chnages regex needs chnege

        if (!(preg_match("/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/",$date1) && (preg_match("/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/",$date2)))){


                throw new \Exception('Invalid Date Format. Valid Format.'. self::DATE_FORMAT);

            }
        }


}