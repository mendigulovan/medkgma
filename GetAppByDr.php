<?php
include_once('resources/init.php');
session_start ();
/*if (empty ( $_SESSION ['email'] ))
	header ( 'Location:login.php' );*/
@$spec_name = $_GET ['spec_name'];
$drId = $_REQUEST ["drId"];
$hist1 = $_REQUEST ["hist"];
$upc1 = $_REQUEST ["upc"];


if ($hist1 == 1) {
	$query = "SELECT appointment.patientid, person.fname, person.lname, appointment.date,
									 appointment.prescription, appointment.appid,person.phonenumber
	 					FROM appointment inner join patient on appointment.patientid=patient.patientid
						INNER JOIN person on patient.email=person.email
						where doctorid=$drId and date <= CURDATE() ORDER BY appointment.date DESC";

	$get = mysqli_query ( $conn, $query );
	$hist = mysqli_fetch_all ( $get );

	if (count ( $hist ) > 0) {
		echo "
				<table id='tg-cHuKU1' class='tg'>
									<tr>
										<th>Пациент</th>
										<th>Дата</th>
										<th>Диагноз</th>
										<th>Номер телефона</th>
										<th>Оплата</th>
									</tr>";

		foreach ( $hist as $app ) {
			echo "<tr><td>$app[0] - $app[1] $app[2]</td><td>$app[3]</td><td>$app[4]</td><td>$app[6]</td>";
			$queryPayment = "select * from paymenthistory where appid=$app[5]";
			$getPayment = mysqli_query ( $conn, $queryPayment );
			$payment = mysqli_fetch_array ( $getPayment );
			$amount = $payment ['amount'];
			if ($amount) {
				echo "<td>$amount</td>";
			} else {
				echo "<td><input type='number'>&nbsp;&nbsp;&nbsp;&nbsp;<button class='btn1'>Сохранить</button></td>";
			}
			echo "</tr>";
		}
		echo "</table>";
	} else {
		echo "<p>Нет записей</p>";
	}
} else if ($upc1 == 1) {
	/*$queryUpc = "SELECT appointment.patientid, person.fname, person.lname, appointment.date,
								TIME_FORMAT(appointment.time, '%H:%i'),  appointment.appid
							FROM appointment inner join patient on appointment.patientid=patient.patientid
							INNER JOIN person on patient.email=person.email where doctorid=$drId
							and date > CURDATE() ORDER BY appointment.date, appointment.time";*/
	$queryUpc =						"SELECT appointment.patientid, person.fname, person.lname, appointment.date,
															 TIME_FORMAT(appointment.time, '%H:%i'), appointment.appid,person.phonenumber
							 					FROM appointment inner join patient on appointment.patientid=patient.patientid
												INNER JOIN person on patient.email=person.email
												where doctorid=$drId and date <= CURDATE() ORDER BY appointment.date DESC";
	$getUpc = mysqli_query ( $conn, $queryUpc );
	$upc = mysqli_fetch_all ( $getUpc );
	if (count ( $upc ) > 0) {
		echo "
				<table id='tg-cHuKU' class='tg'>
									<tr>
										<th>Пациент</th>
										<th>Дата</th>
										<th>Время</th>
										<th></th>
									</tr>";

		foreach ( $upc as $app ) {
			echo "<tr><td>$app[0] - $app[1] $app[2]</td><td>$app[3]</td><td>$app[4]</td>";
			echo "<td><a href='makeAppointment.php?appId=" . $app [5] . "'>Изменить</a><br />";
			echo "<a href='cancelApp.php?appId=" . $app [5] . "'>Отменить</a></td></tr>";
		}
		echo "</table>";
	} else {
		echo "<p>Нет записей</p>";
	}
}
?>
