<?php
include("database.php");

$user_name = $_POST['username-input'];
$user_pass = $_POST['password-input'];

$user_name = mysqli_real_escape_string($config, $user_name);
$user_pass = mysqli_real_escape_string($config, $user_pass);

$sql = "SELECT * FROM accounts WHERE username = '$user_name' AND password = '$user_pass'";
$result = mysqli_query($config, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count = mysqli_num_rows($result);

if($count == 1) {
	$_SESSION['user-details'] = $user_name;
	header("location: home.php");
}
else {
	echo "<h1>Invalid Username/Password</h1>";
	header("location: ../index.php?Invalid");
}

?>