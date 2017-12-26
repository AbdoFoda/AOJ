<?php
$begin = new DateTime( '2015-01-01' );
$end = new DateTime( '2017-12-26' );

$interval = new DateInterval('P6M');

$period = new DatePeriod($begin, $interval, $end);

$oneDay = new DateInterval("P1D");
$oneDay->invert=1; #just get the previous day
foreach ( $period as $dt ){
    echo  $dt->format("Y-m-d"); #interval start
    $dt->add($interval); #adding the interval size
   	$dt->add($oneDay);	 #get the last day of the cur interval
   	echo "<br>";
    echo $dt->format("Y-m-d");  #interval end
    echo "<br>";
	}
?>