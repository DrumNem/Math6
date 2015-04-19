<?php

function simp_method($array)
{	
  	$a = $array[1];
  	$b = $array[2];
  	$h = ($b - $a) / $array[3];
 	$i = $a;
 	$sum = 0;
 	$sum2 = 0;
 	$sum3 = 0;

	if ($b > 0)
		while (++$i < $array[3])
		    $sum += calc_fx($array[0], ($a + $i * $h));
	else
		while (--$i < $array[3])
	 		$sum += calc_fx($array[0], ($a + $i * $h));
  	$i = -1;
  	if ($b > 0)
  		while (++$i < $array[3])
    		$sum2 += calc_fx($array[0], ($a + $i * $h) + ($h / 2));
  	else
    	while (--$i > $array[3])
      		$sum2 += calc_fx($array[0], ($a + $i * $h) + ($h / 2));

  	$sum3 = (($sum * 2) + ($sum2 * 4) + calc_fx($array[0], $a) + calc_fx($array[0], $b)) * (($b - $a) / (6 * $array[3]));
	
	echo "\033[37;1;4mMéthode de Simpson:\n\033[0m";
	echo 'I'.$array[0].': '.number_format($sum3, $array[4])."\n";
  	echo 'Diff: '.number_format($sum3 - pi() / 2, $array[4])."\n\n";
}

function gauss_method($array)
{	
  	$a = $array[1];
  	$b = $array[2];
  	$h = ($b - $a) / $array[3];
 	$i = $a;
 	$sum = 0;

	if ($b > 0)
		while (++$i < $array[3])
		    $sum += calc_fx($array[0], ((($b - $a) / 2) * $i + ($a + $b) / 2));
	else
		while (--$i > $array[3])
	 		$sum += calc_fx($array[0], ((($b - $a) / 2) * $i + ($a + $b) / 2));

	$sum *= $h * ($b - $a) / 2;
	
	echo "\033[37;1;4mMéthode de Gauss:\n\033[0m";
	echo 'I'.$array[0].': '.number_format($sum, $array[4])."\n";
  	echo 'Diff: '.number_format($sum - pi() / 2, $array[4])."\n";
}

?>