Aligent DateTime Conversion Task
================================


Description
----------------------------------

1. Find out the number of days between two date parameters.
2. Find out the number of weekdays between two date parameters.
3. Find out the number of complete weeks between two date parameters.
4. Accept a third parameter to convert the result of (1, 2 or 3) into one of seconds, minutes, hours, years.
5. Allow the inclusion of a timezone string for comparison of date parameters from different timezones.


Installation
---------------

    git clone https://guithub.com/elijan/aligent.git

    composer install

Notes
-------------------
The reason I used static methods it is because function like this onr are usually available on the global scope and therefore should be stateless.
So that there is clear understanding what following does:

      Aligent\DateTimeConverter::getNumberOfDays('1/02/2010','1/02/2015')


There was another way to do it, where the object is instantiated  and then manipulated .e.g

     $datetime  = new Aligent\DateTimeConverter('1/02/2015','18/02/2015');
     $datetime->NumberOfWeeks('1/02/2015','18/02/2015')->format('s');

This may be cleaner way by using extending DateTime class, but since the task 4 explicitly said to use third parameters I decided on static methods instead of mili level inhertence.

Saying that, Inclusion of Timezone is per function, as task was unclear weather these are global sections or local or should it be parsed as parameter.

Bottom line Depending on usage teh design pattern should relect that as well.


Unit Tests
----------------------
Run local phpunit that comes with composer

    >wrokinddir# vendor/bin/phpunit
