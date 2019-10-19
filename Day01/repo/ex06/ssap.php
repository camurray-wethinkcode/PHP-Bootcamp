#!/usr/bin/php
<?PHP
$array = array();
for ($x = 1;$x < $argc;$x++)
	$array = array_merge($array, explode(" ", trim(preg_replace('/ +/', ' ', $argv[$x]))));
sort($array);
foreach ($array as $output)
	echo $output."\n";
?>
