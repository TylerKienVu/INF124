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

//insert person address
$insert_person_address = "INSERT INTO Address (address_1, address_2, city, state, zip) 
VALUES ('$_POST[shipAddress]','$_POST[shipAddress2]','$_POST[city]','$_POST[state]','$_POST[zip]')";
if (!mysqli_query($conn, $insert_person_address)){
	die('Error: '.mysqli_error($conn));
}
else {
	// echo "Personal address record added<br>";
	$person_address_id = $conn->insert_id;
}

//insert person
$insert_person = "INSERT INTO Person (address_id, email, first_name, last_name, phone)
VALUES ('$person_address_id','$_POST[email]','$_POST[fname]','$_POST[lname]','$_POST[phone]')";
if (!mysqli_query($conn, $insert_person)){
	die('Error: '.mysqli_error($conn));
}
else {
	// echo "Person record added<br>";
	$person_id = $conn->insert_id;
}

//insert pay address
$insert_pay_address = "INSERT INTO Address (address_1, address_2, city, state, zip)
VALUES ('$_POST[billAddress]','$_POST[billAddress2]','$_POST[billCity]','$_POST[billState]','$_POST[billZip]')";
if (!mysqli_query($conn, $insert_pay_address)){
	die('Error: '.mysqli_error($conn));
}
else {
	// echo "Pay address record added<br>";
	$pay_address_id = $conn->insert_id;
}

//insert payment
$insert_payment = "INSERT INTO Payment (address_id,card_number,csc,expiration,name)
VALUES ('$pay_address_id','$_POST[cardNumber]','$_POST[csc]','$_POST[expiration]','$_POST[cardName]')";
if (!mysqli_query($conn, $insert_payment)){
	die('Error: '.mysqli_error($conn));
}
else {
	// echo "Payment record added<br>";
	$payment_id = $conn->insert_id;
}

//insert order
$insert_order = "INSERT INTO Orders (payment_id,person_id,quantity,rock_id)
VALUES ('$payment_id','$person_id','$_POST[quantity]','$_POST[rockNum]')";
if (!mysqli_query($conn, $insert_order)){
	die('Error: '.mysqli_error($conn));
}
else {
	// echo "Order record added<br>";
	$order_id = $conn->insert_id;
}

echo "<h2>Order Summary</h2><br>";
echo "Rock number purchased: ".$_POST['rockNum']."<br>";
echo "Number of orders: ".$_POST['quantity']."<br>";
echo "Order #: ".$order_id."<br>";
echo "Shipping address: ".$_POST['shipAddress']." ".$_POST['shipAddress2'].", ".$_POST['city']." ".$_POST['state']." ".$_POST['zip'];
echo "<br><br>";
echo "<h3>Thank you for your order!</h3>";

mysqli_close($conn);
?>