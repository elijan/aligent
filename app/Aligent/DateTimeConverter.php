<?php

namespace Aligent;


class DateTimeConverter  {


    const SECONDS = 'S';
    const MINUTES = 'M';
    const HOURS = 'H';
    const YEARS = 'Y';
    const DATE_FORMAT = 'd/m/Y';


    /**
     * @param $date1
     * @param $date2
     * @param null $format
     *
     * @return int
     *
     */
    public static function getNumberOfDays($date1, $date2,  $format = null){

        self::checkDateFormat($date1, $date2);


        $startDate = \DateTime::createFromFormat(self::DATE_FORMAT,$date1, new \DateTimeZone('Australia/Adelaide'));
        $endDate = \DateTime::createFromFormat(self::DATE_FORMAT,$date2, new \DateTimeZone('Australia/Adelaide'));


        $days = $endDate->diff($startDate)->days;

        return self::formatDays($days, $format);



    }

    /**
     * @param $date1
     * @param $date2
     * @param String $format
     * @return integer
     *
     * Returns Number of Working Days by calculating the intervals
     */
    public static function getNumberOfWeekdays($date1, $date2,  $format = null){

        self::checkDateFormat($date1, $date2);

        $startDate = \DateTime::createFromFormat(self::DATE_FORMAT,$date1, new \DateTimeZone('Australia/Adelaide'));
        $endDate = \DateTime::createFromFormat(self::DATE_FORMAT,$date2, new \DateTimeZone('Australia/Adelaide'));

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

            return self::formatDays($days, $format);
        }


        return 0;

    }


    /**
     * @param $date1
     * @param $date2
     * @param null $format
     * @return int
     *
     * Retunrn number of weeks for given date range
     */
    public static function getNumberOfWeeks($date1, $date2, $format = null){

        $startDate = \DateTime::createFromFormat(self::DATE_FORMAT,$date1, new \DateTimeZone('Australia/Adelaide'));
        $endDate = \DateTime::createFromFormat(self::DATE_FORMAT,$date2, new \DateTimeZone('Australia/Adelaide'));

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
        if($format){
            return self::formatDays(iterator_count($period) * 7, $format);
        }

        //otherwise return count of weeks
        return iterator_count($period);

    }


    /**
     *
     * @param $days
     * @param $format
     * @return mixed
     *
     * Formats Days in fomrta specied in inoput
     */

    private static function formatDays($days, $format){

        $output = $days;

        switch($format){

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