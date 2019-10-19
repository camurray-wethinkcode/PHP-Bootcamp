#!/usr/bin/php
<?PHP
if ($argc > 1)
{
	$array = explode(" ", trim(preg_replace('/ +/', ' ', $argv[1])));
	$y = count($array);
	for ($x = 1;$x < $y;$x++)
		echo $array[$x]." ";
	echo $array[0]."\n";
}
?>
