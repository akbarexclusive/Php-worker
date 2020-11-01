<?php

$checkpoint1 = microtime(true);

//input array 
$arr = array (
  array(4,17),
  array(7,11,13,9),
);


$res = $count= array();

//justto sort
$newArray = $arr[1];
sort($newArray);

$length = count($newArray);

$min = $newArray[0];
$max = $newArray[$length-1];

//initilization as its zero
foreach ($arr[1] as $key ) {
	
	$res[$key] = 0;
	$count[$key] = $max;

}

for($completeSum =0; $completeSum <= $arr[0][1] -1;) {

	$result = calculatePackagingTimeTaken($res,$count,$completeSum,$arr[0][1]);

	$completeSum = $result[2];

	$res = $result[0];
	$count = checkTimeUpdate($result[1],$max);

}

	$checkpoint2 = microtime(true);

	echo 'In ' . (($checkpoint2-$checkpoint1)*1000)." ms\n <br>" ;

	$i = 1;

 	foreach ($arr[1] as $key) {
 	 	# code...
 	 	echo "Worker ".$i. " packs " . $result[0][$key] . " Items <br>";
 	 	 $i++;
 	 } 


function calculatePackagingTimeTaken($res,$count,$completeSum,$tsum){


	foreach ($res as $key => $value) {
	
		$time = $count[$key];

		if($key <= $time){

			$val = (int)$value + 1; 

			$res[$key] = $val;

			$count[$key] = ($time - $key);

			$completeSum  +=1;

		}

		if($completeSum == $tsum){
			return array($res,$count,$completeSum);
		}

		}

	return array($res,$count,$completeSum);
}

function checkTimeUpdate($count,$max){

	$counter = count($count);
	$arrayCount = 0;

	foreach ($count as $key => $value) {

		if((int)$value < (int)$key ){

			$arrayCount ++;
		}	

	}

	if($arrayCount == $counter){

		foreach ($count as $key => $value) {

			$count[$key] = (int)$value + $max; 

		}

	}

	return $count;

}



?>