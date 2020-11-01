<?php

$firstDay = array(79,82,42,44,43,55,62,87, 85,88,89,81);


$secondDay = array(81,77,45,41,39,48,71,78, 81,84,82,72); 


function calculateEggsRequired($thirdDay){

	//calculate largest 2 in 1st 8hr 

	$max1 = $thirdDay[0];
	$max2 = $thirdDay[1];
	$sum = $max1 + $max2;

	for ($i=2; $i< count($thirdDay) -1 ; $i++) {
		
		$sum += $thirdDay[$i];

		if($thirdDay[$i] > $max1){

			$temp = $max1;
			$max1 = $thirdDay[$i];
			$max2 = $temp > $max1 ? $temp : $max2;

		}

	}

	$differenceBetweenMax = abs($max1-$max2);
	$requiredAverage = ($max1 - $max2 + $differenceBetweenMax )/2;


	return ($requiredAverage * 4) + $sum;

}

$thirdDay = array(77,53,33,32,49,53,68,71); 
echo "Eggs Required to Order " .calculateEggsRequired($thirdDay);

?>
