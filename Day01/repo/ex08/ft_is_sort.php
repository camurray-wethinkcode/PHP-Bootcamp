#!/usr/bin/php
<?PHP
function ft_is_sort($array)
{
	$tmp = $array;
	sort($tmp);
	foreach ($array as $key => $value)
		if ($value != $cpy[$key])
			return false;
	return true;
}
/*
$tab = array("!/@#;^", "42", "Hello World", "hi", "zZzZzZz");
$tab[] = "What are we doing now?";

if (ft_is_sort($tab))
	echo "The array is sorted\n";
else
	echo "The array is not sorted\n";
 */
?>
