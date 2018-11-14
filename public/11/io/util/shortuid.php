<?php
function shortuid($input) { 
	$base32 = array ( 
		'C', 'F', 'E', 'G', 'H', 'A', 'B', 'D',
		'6', 'J', 'K', '7', 'M', 'N', '8', 'P', 
		'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 
		'2', '3', 'Z', '9', '1', '4', '5', 'Y'
	); 

	$dest = array('C','C','C','C','C','C');
	$val = intval($input);
	$pos = 5;
	while($val>0 && $pos>=0){
		$mod = $val%32;
		$dest[$pos] = $base32[$mod];
		
		$pos = $pos -1;
		$val = floor($val/32);
	}
	$val = "";
	foreach($dest as $item){
		$val = $val.$item;
	}
	return $val; 
}
/*
echo shortuid(32)."<br>";
echo shortuid(64)."<br>";
echo shortuid(1024)."<br>";
echo shortuid(1025)."<br>";
*/
?>