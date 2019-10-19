#!/usr/bin/php
<?PHP
if ($argv[1])
	print(trim(preg_replace('/[ \t]+/', ' ', $argv[1]))."\n");
?>
