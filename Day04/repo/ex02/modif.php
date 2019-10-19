<?php
$login = $_POST['login'];
$oldpasswd = $_POST['oldpasswd'];
$newpasswd = $_POST['newpasswd'];
$submit = $_POST['submit'];
if (!$login || !$oldpasswd || !$newpasswd || $submit != "OK")
    exit("ERROR\n");
if (!file_exists("../private/passwd"))
    exit();
$pwd_file = file_get_contents("../private/passwd");
$arr = unserialize($pwd_file);
foreach ($arr as $key => $user)
	if ($user['login'] == $login)
		if ($user['passwd'] == hash("sha256", $oldpasswd))
		{
            $arr[$key]['passwd'] = hash("sha256", $newpasswd);
            $output = serialize($arr);
            file_put_contents("../private/passwd", $output);
            exit("OK\n");
		}
		else
			exit("ERROR\n");
?>
