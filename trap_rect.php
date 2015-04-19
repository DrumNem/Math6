<?php

function calc_fx($n, $x)
{
  $sum = 1;
  $k = -1;

  while (++$k <= $n)
    if ($x != 0)
      $sum *= (sin($x / ((2 * $k) + 1)) / ($x / ((2 * $k) + 1)));
  return ($sum);
}

function rect_method($array)
{	
  	$a = $array[1];
  	$b = $array[2];
  	$h = ($b - $a) / $array[3];
 	$i = $a - 1;
 	$sum = 0;

	if ($b > 0)
		for ($i = $a; $i < $array[3] ; $i++)
	  	    $sum += calc_fx($array[0], ($a + $i * $h));
	else
		while (--$i < $array[3])
	 		$sum += calc_fx($array[0], ($a + $i * $h));

	$sum *= ($b - $a) / $array[3];
	
	echo "\033[37;1;4mMéthode des rectangles:\n\033[0m";
	echo 'I'.$array[0].': '.number_format($sum, $array[4])."\n";
  	echo 'Diff: '.number_format($sum - pi() / 2, $array[4])."\n\n";
}

function trap_method($array)
{
  	$a = $array[1];
  	$b = $array[2];
  	$h = ($b - $a) / $array[3];
  	$i = $a;
 	$sum = 0;

	if ($b > 0)
		while (++$i < $array[3])
      		$sum += calc_fx($array[0], ($a + $i * $h));
 	else
 		while (--$i < $array[3])
      		$sum += calc_fx($array[0], ($a + $i * $h));
  
  	$sum = (($sum * 2) + calc_fx($array[0], $a) + calc_fx($array[0], $b)) * (($b - $a) / (2 * $array[3]));

  	echo "\033[37;1;4mMéthode des trapèzes:\033[0m\n";
 	echo 'I'.$array[0].': '.number_format($sum, $array[4])."\n";
  	echo 'Diff: '.number_format($sum - pi() / 2, $array[4])."\n\n"; 
}

?>
