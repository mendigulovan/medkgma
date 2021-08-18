<?php
include_once('resources/init.php');

		if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response']))
		{
					$secret = '6LcwjKUUAAAAAJ-5cclZQXCoQ-k82LjH2ahrBmUW';
					$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
					$responseData = json_decode($verifyResponse);
					if($responseData->success)
					{
							$succMsg = 'Your contact request have submitted successfully.';
					}
					else
					{
							$errMsg = 'Robot verification failed, please try again.';
					}
		 }

$email = $_POST ['email'];
$fname = $_POST ['fname'];
$lname = $_POST ['lname'];
$state = $_POST ['state'];
$userPassword = $_POST ['password'];
$gender = $_POST ['element_7'];
$phone = $_POST ['phone'];
$role = 'patient';
$date = $_POST ['date'];
$streetaddress = $_POST ['address'];
$city = $_POST ['city'];




if (! $conn) {
	die ( "Connection failed: " . mysqli_connect_error () );
}

$sql = "INSERT INTO person (city, dob, email,fname,gender,lname,role,streetaddress,phonenumber)
                VALUES ('$city', '$date', '$email','$fname','$gender','$lname','$role','$streetaddress','$phone')";

$get = mysqli_query ( $conn, $sql );

$sql = "INSERT INTO login (email,password,role)
                VALUES ('$email','$userPassword','$role') ";

$sql2 = "INSERT INTO patient (email) VALUES('$email')";

$get = mysqli_query ( $conn, $sql );
$get = mysqli_query ( $conn, $sql2 );
session_start ();
$_SESSION ['email'] = $email;
$_SESSION ['role'] = $role;
header ( 'Location:home.php' );

?>
