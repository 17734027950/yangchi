<?php
/**
 * 
 */

require_once __DIR__."/../vendor/autoload.php";

use Overtrue\ChineseCalendar\Calendar;

$calendar = new Calendar();

$result = $calendar->solar(2017, 5, 5); // 阳历
$result = $calendar->lunar(2017, 4, 10); // 阴历
$result = $calendar->solar(1989, 7, 14, 0); // 阳历，带 $hour 参数

var_dump($result);

?>