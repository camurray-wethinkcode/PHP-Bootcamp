#!/usr/bin/php
<?PHP
function ft_split($input)
{
	$array = explode(" ", trim(preg_replace('/ +/', ' ', $input)));
	sort($array);
	return $array;
}
/*
print_r(ft_split($argv[1]));
*/
?>
