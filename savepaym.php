<?php
include_once('resources/init.php');

$amount = $_POST["amount"];
$appid =  $_POST["appid"];

if (isset($_POST["amount"])) {
  //Вставляем данные, подставляя их в запрос
  $sql = "INSERT INTO paymenthistory (appid, amount) VALUES ($appid, $amount)";
  $get = mysqli_query ( $conn, $sql );
  //Если вставка прошла успешно
  if ($get) {
    echo '<p>1</p>';
  } else {
    echo '<p>0</p>' . mysqli_error($link) . '</p>';
  }
}
?>
