<?php

@$spec_name = $_GET ['spec_name'];
include_once('resources/init.php');

if (! $conn) {
	die ( "Connection failed: " . mysqli_connect_error () );
}

mysqli_select_db ( $conn, $database );
$email = $fname = $lname = $gender = $password = $phone = $date = null;
?>
<!DOCTYPE html>
<html>
<head>
<title>Регистрация</title>
<link href="css/bootstrap.css" type="text/css" rel="stylesheet"
	media="all">
<link href="css/style.css" type="text/css" rel="stylesheet" media="all">
<link href="css/styles.css" rel="stylesheet">
<!--web-font-->
<link
	href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
	rel='stylesheet' type='text/css'>
<link
	href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
	rel='stylesheet' type='text/css'>
<!--//web-font-->
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript">
	 addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); }
</script>
<script
	src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<!-- //Custom Theme files -->
<!-- js -->
<script src="js/jquery.min.js"></script>
<script src="js/modernizr.custom.js"></script>
<!-- //js -->
<script src="https://www.google.com/recaptcha/api.js" async defer>></script>

</head>
<body>
	<!--header-->
	<div class="wrapper container">
  <?php require_once 'header.php'; ?>
	<!--//header-->
	<!--content-->
	<div class="content">
		<div class="container">
			<div class="content-grids">
				<div class="work-title humble-title">
					<h3>
						Регистрация<span>пациента</span>
					</h3>
				</div>
				<div class="features-info">
					<div class="features-text tg-wrap">
						<form id="form_register" class="appnitro" method="post"
							action="createProfile.php">
							<table class='tg'
								style="width: 60%; margin-left: 20%; margin-right: 20%">
								<tr>
									<td>Email</td>
									<td><input id="email" name="email"
										type="Email" required maxlength="255"
										value="<?php echo $email;?>" /></td>
								</tr>
								<tr>
									<td>Пароль</td>
									<td><input id="password" name="password" type="password" maxlength="255"
										value="<?php echo $password;?>" required /></td>
								</tr>
								<tr>
									<td>Имя</td>
									<td><input id="fname" name="fname"
										type="text" maxlength="255" value="<?php echo $fname;?>"
										required /></td>
								</tr>
								<tr>
									<td>Фамилия</td>
									<td><input id="lname" name="lname"
										type="text" maxlength="255" value="<?php echo $lname;?>"
										required /></td>
								</tr>
								<tr>
									<td>Пол</td>
									<td><input id="element_7_1" name="element_7" type="radio"
										value="Male" required>Мужской <input id="element_7_2"
										name="element_7" type="radio" value="Female">Женский</td>
								</tr>
								<tr>
									<td>Телефон</td>
									<td><input id="phone" name="phone"
										type="number"
										value="<?php echo $phone;?>" required /></td>
								</tr>
								<tr>
									<td>День рождения</td>
									<td><input type="date" id="date" name="date"
										value="<?php echo $date?>" required /> <span id="calendar_5">
									</span> <script type="text/javascript">
			Calendar.setup({
			inputField	 : "element_5_3",
			baseField    : "element_5",
			displayArea  : "calendar_5",
			button		 : "cal_img_5",
			ifFormat	 : "%B %e, %Y",
			onSelect	 : selectDate
			});
		</script></td>
								</tr>
								<tr>
									<td>Адрес : Улица</td>
									<td><input id="address" name="address"
										class="element text large" value="" type="text" required></td>
								</tr>
								<tr>
									<td>Город</td>
									<td><input id="City" name="city"
										value="" type="text" required></td>
								</tr>
								<tr>
									<td></td>
									<td><div class="g-recaptcha" data-sitekey="6LcwjKUUAAAAALFW0d5M4j2c7xhOAD_ynuF9BYTZ"></div></td>
								</tr>
								<tr>
									<td></td>
									<td>
								<input type="hidden" name="form_id" value="1123787"
										required /><Button id="saveForm" class="btn1" type="submit"
										name="submit">Подтвердить</button></td>

								</tr>
							</table>
						</form>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--//content-->

	<!--smooth-scrolling-of-move-up-->

	<a href="#" id="toTop" style="display: block;"> <span id="toTopHover"
		style="opacity: 1;"> </span></a>
	<!--//smooth-scrolling-of-move-up-->
</body>
</html>

<html>


<script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear'
			};
			 */

			$().UItoTop({
				easingType : 'easeOutQuart'
			});

		$("#submit").click(function()
		{
			var urlParams;
			var match,
	        pl     = /\+/g,  // Regex for replacing addition symbol with a space
	        search = /([^&=]+)=?([^&]*)/g,
	        decode = function (s) { return decodeURIComponent(s.replace(pl, " ")); },
	        query  = window.location.search.substring(1);
	        urlParams = {};
	        while (match = search.exec(query))
		        urlParams[decode(match[1])] = decode(match[2]);

			var radioValue = $("input[name='gender']:checked").val();
			var review = $("#review").val().replace(" ","_");
 	        if(radioValue)
	        {
				if (window . XMLHttpRequest) {
					// code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp = new XMLHttpRequest ();
				} else {
					// code for IE6, IE5
					xmlhttp = new ActiveXObject ( "Microsoft.XMLHTTP" );
				}
				xmlhttp.onreadystatechange = function () {
					if (xmlhttp . readyState == 4 && xmlhttp . status == 200) {
						window.location.href = xmlhttp.responseText;
					}
				};
				xmlhttp . open ( "GET", "doctorRatingStore.php?appId=" + $firstname + "&rating=" + $lastname + "&review=" + $Console, true);
				xmlhttp . send ();
	        }
			});
		});
	</script>

</html>
