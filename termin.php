<?php
include_once('resources/init.php');
include('functions.php');
include('blog.php');
?>
<?php
session_start ();
?>
<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
  <title>Login</title>
  <link href="css/bootstrap.css" type="text/css" rel="stylesheet"
  	media="all">
  <link href="css/style.css" type="text/css" rel="stylesheet" media="all">
  <link href="css/styles.css" rel="stylesheet">

  <link href="http://fonts.googleapis.com/css?family=Oswald:400,300" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
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
  <meta name="keywords"
  	content="Hospice Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
  	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
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

  </head>
<body>
  <!-- Header
  ================================================== -->
  <div class="wrapper container">
  <?php require_once 'header.php'; ?>
	<!--//header-->

  <!-- Navbar
   ================================================== -->
   <span class="menu"><img src="images/menu-icon.png" alt=""/></span>
  <nav class="navbar navbar-default">
      <ul class="nav navbar-nav">
        <li><a href="/">Главная</a></li>
        <li><a href="about.php">О медцентре</a></li>
        <li><a href="uslugi.php">Услуги</a></li>
        <li><a href="doctor.php">Специалисты</a></li>
        <li><a href="prices.php">Цены</a></li>
        <li><a href="akcii.php">Акции</a></li>
        <li><a href="contacts.php">Контакты</a></li>
      </ul>
    </nav>

	<!--blog-->

	<div class="blog">
		<div class="container">
			<div class="work-title">
				<h3>Зайти в личный кабинет</h3>
			</div>
			<div id="loginBox" class="features-info" style="text-align: center;">

				<form id="loginForm" method="POST" action="connectivity.php"
					style="margin: auto;">
					<div>
						<input type="email" class="text" name="user"
							placeholder="Username" required />
					</div>
					<div>
						<input type="password" name="pass" placeholder="Пароль" required />
					</div>
					<input type="submit" id="login" value="Sign in"></input><br /> <span><a
						href="registration.php">Зарегистрироваться</a></span>
				</form>

			</div>
		</div>
	</div>
	<!--//blog-->


	<a href="#" id="toTop" style="display: block;"> <span id="toTopHover"
		style="opacity: 1;"> </span></a>
	<!--//smooth-scrolling-of-move-up-->
</body>
</html>
