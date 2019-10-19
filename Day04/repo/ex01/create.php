<?php
$login = $_POST['login'];
$passwd = $_POST['passwd'];
$submit = $_POST['submit'];
if (!$login || !$passwd || $submit != "OK")
	exit ("ERROR\n");
if (file_exists("../private/passwd"))
{
    $pwd_file = file_get_contents("../private/passwd");
    $arr = unserialize($pwd_file);
}
else
{
    if (!file_exists("../private"))
        mkdir("../private");
    $arr = array();
}
foreach ($arr as $key=>$user)
    if ($user['login'] == $login)
        exit ("ERROR\n");
$arr[$key + 1]['login'] = $login;
$arr[$key + 1]['passwd'] = hash("sha256",$passwd);
$output = serialize($arr);
file_put_contents("../private/passwd", $output);
echo ("OK\n");
?>
