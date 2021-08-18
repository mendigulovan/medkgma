<?php include_once('resources/init.php');
include('functions.php'); ?>
<!DOCTYPE html>
<html>
<head>
			<!--- Basic Page Needs
			================================================== -->
			<meta charset="utf-8">
			<title>МедЦентр КГМА</title>
			<!-- mobile specific metas
			 ================================================== -->
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<link href="css/styles.css" rel="stylesheet">
			<link href="http://fonts.googleapis.com/css?family=Oswald:400,300" rel="stylesheet">
			<link href="css/style.css" type="text/css" rel="stylesheet" media="all">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

			<!--web-font-->
			<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
			<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
			<!--//web-font-->
			<!-- Custom Theme files -->
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<meta name="keywords" content="Hospice Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
				Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
			<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
			<!-- //Custom Theme files -->
			<!-- js -->
			<script src="js/jquery.min.js"></script>
			<script src="js/modernizr.custom.js"></script>
			<!-- //js -->
			<!-- start-smoth-scrolling-->
			<script type="text/javascript" src="js/move-top.js"></script>
			<script type="text/javascript" src="js/easing.js"></script>
			<script type="text/javascript" src="js/modernizr.custom.53451.js"></script>
			<script type="text/javascript">
					jQuery(document).ready(function($) {
						$(".scroll").click(function(event){
							event.preventDefault();
							$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
						});
					});
			</script>
			<!--//end-smoth-scrolling-->
			</head>
<body>
	<!--header-->
	<div class="wrapper container">
<?php require_once 'header.php'; ?>
	<!--//header-->
	<nav class="navbar navbar-default">
			<ul class="nav navbar-nav">
				<li><a href="/">Главная</a></li>
				<li><a href="about.php">О медцентре</a></li>
				<li><a href="uslugi.php">Услуги</a></li>
				<li><a href="doctor.php">Специалисты</a></li>
				<li><a href="prices.php">Цены</a></li>
				<li><a href="akcii.php">Акции</a></li>
				<li  class="active"><a href="contact.php">Контакты</a></li>
			</ul>
		</nav>

	<!--contact-->
	<div class="contact">
		<div class="container">
				<h1 style="background-color:#4286f4; color:white;">Связаться с нами</h1>
			<div class="contact-infom">
				<h4>Информация :</h4>
				<p>Вы можете задать интересующий вас вопрос или оставить отзыв. С уважением, МедЦентр.</p>
			</div>
			<div class="address">
				<div class="col-md-4 address-grids">
					<h4>Адрес :</h4>
					<ul>
						<li class="home"> </li>
						<li><p>Тыныстанова, 1<br>
								Бишкек, Киргизия</p>
						</li>
					</ul>
				</div>
				<div class="col-md-4 address-grids">
					<h4>Контактные номера :</h4>
					<p><span class="phn"></span>+996 (312) 56 55 52</p>
				</div>
				<div class="col-md-4 address-grids">
					<h4>EMAIL :</h4>
					<p><span class="mail"></span><a href="mailto:example@mail.com">muktarbek@mail.ru</a></p>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="contact-form">
				<h4>Контактная форма</h4>
				<form>
					<input type="text" value="Имя" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
					<input type="email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
					<input type="text" value="Телефон" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Telephone';}" required="">
					<textarea type="text"  onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Сообщение...</textarea>
					<button class="btn1">Отправить</button>
				</form>
				<!-- Map
			 ================================================== -->
				<div class="panel panel-primary">
					<div class="panel-heading">Где мы находимся?</div>
					<div class="panel-body">
						<div id="map"></div>
								 <script src="js/map.js"></script>

								 <script async defer
								 src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC_Izzf48ONA0rn5zYQ4HM7lQVfIDN6FVo&callback=initMap">
								 </script>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
	<!--smooth-scrolling-of-move-up-->
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

				$().UItoTop({ easingType: 'easeOutQuart' });

			});
		</script>
		<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<!--//smooth-scrolling-of-move-up-->
	  <footer><?php require_once 'footer.php'; ?></footer>
</body>
</html>
