<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "matt-smith-v4.ics.uci.edu";
$username = "inf124db061";
$password = "TMcVwhIMAmW^";

//create connection
$conn = mysqli_connect($servername, $username, $password);
mysqli_select_db($conn,"inf124db061");

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully<br>";

$rockNum = $_GET['id'];
// echo $rockNum."<br>";

$rock_price_query = "SELECT price_per_order from Rocks where rock_id = ".$rockNum;
$query_result = mysqli_query($conn,$rock_price_query);
$row = mysqli_fetch_assoc($query_result);

// echo "price: ".$row['price_per_order']."<br>";

echo $row['price_per_order'];


?>