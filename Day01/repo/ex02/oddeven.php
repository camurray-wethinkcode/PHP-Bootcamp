#!/usr/bin/php
<?PHP
while (true)
{
	echo "Enter a number: ";
	if (($input = fgets(STDIN)) == null)
	{
		exit("\n");
	}
	$input = trim($input);
	if (is_numeric($input))
	{
		if (substr($input, -1) % 2 == 0)
			echo "The number ".$input." is even"."\n";
		else
			echo "The number ".$input." is odd"."\n";
	}
	else
	{
		echo "'".$input."' is not a number"."\n";
	}
}
?>
