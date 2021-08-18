<?php
include_once('resources/init.php');
include('functions.php');
$doctors = get_doctors(null,$_GET['id']);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/our_lightbox.css">
    <link href="css/lightbox.min.css" rel="stylesheet">
    <script src="js/lightbox-plus-jquery.min.js"></script>
  </head>
  <body>
    <!-- Header
   ================================================== -->
    <div class="wrapper container">
  <?php require_once 'header.php'; ?>
  <!-- Navbar
   ================================================== -->
  <nav class="navbar navbar-default">
      <ul class="nav navbar-nav">
        <li><a href="/">Главная</a></li>
        <li><a href="about.php">О медцентре</a></li>
        <li><a href="uslugi.php">Услуги</a></li>
        <li class="active"><a href="doctor.php">Специалисты</a></li>
        <li><a href="prices.php">Цены</a></li>
        <li><a href="akcii.php">Акции</a></li>
        <li><a href="contacts.php">Контакты</a></li>
      </ul>
		</nav>

    <!-- Submenu
   ================================================== -->
		<div class="row">
			<aside class="col-md-7">
			     <?php require_once 'submenu.php'; ?>
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
			</aside>
      <!-- Content
     ================================================== -->
			<section class="col-md-17">
        <div class="row">
        <h1>Наши специалисты</h1>
        <div class="entry-meta">
            <div class="container">
              <div class="row">
                <?php
                foreach($doctors as $doctor){
                  ?>

                    <div class="col-md-8">
                      <a href="<?php echo $doctor['doctor_img'];?>" data-lightbox="image"><img src ="<?php echo $doctor['doctor_img'];?>" class="img-fluid" height="150px"></a>
                      <p><?php echo $doctor['doctor_name']; ?></p>
                      <h5> Отдел: <?php echo $doctor['name']; ?></h5>
                      <h5> График работы: С <?php echo round($doctor['starttime']); ?> до <?php echo round($doctor['endtime']); ?> ч.</h5>
                    </div>

                  <?php
                    }
                  ?>
                </div>
              </div>
            </div>
            <!-- Termin -->
            <div class="col-md-8 .col-md-offset-8">
                <div class="termin">
                  <form action="termin.php">
                  <button type="submit" class="btn btn-primary btn-lg">Записаться к врачу</button>
                </form>
            </div>
            </div>
      </section>
  </div> <!-- end row -->
</div> <!-- end wrapper container -->
</div>
  <footer><?php require_once 'footer.php'; ?></footer>
  </body>
</html>
