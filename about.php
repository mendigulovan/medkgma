<?php
include_once('resources/init.php');
include('functions.php');
$doctors = get_doctors(null,$_GET['id']);
$about_pages = get_about(null,$_GET['id']);
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
    <link href="css/number.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Oswald:400,300" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

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
				<li class="active"><a href="about.php">О медцентре</a></li>
				<li><a href="uslugi.php">Услуги</a></li>
				<li><a href="doctor.php">Специалисты</a></li>
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
        <!-- Termin -->
        <div class="row">
        <div class="col-md-8 .col-md-offset-8">
            <div class="termin">
              <form action="termin.php">
              <button type="submit" class="btn btn-primary btn-lg">Записаться к врачу</button>
              </form>
            </div>
        </div>
      </div>
			</aside>
         <h1>Медицинский центр КГМА</h1>
         <p style="font-style: italic">Для тех, кто привык доверять своё здоровье профессионалам!</p>
      <!-- Slider
     ================================================== -->
			<section class="col-md-17">
              <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right"></span>
                  <span class="sr-only">Next</span>
                </a>
            </div>
        <!-- Number Animation
       ================================================== -->

       <div class="wrapper">
         <div class="counter col-fourth">
           <i class="fas fa-first-aid fa-3x"></i>
           <h2 class="count">20</h2>
           <p class="count-text">Лет опыта</p>
         </div>
         <div class="counter col-fourth">
           <i class="fas fa-user-md fa-3x"></i>
           <h2 class="count">78</h2>
           <p class="count-text">Специалистов</p>
         </div>
         <div class="counter col-fourth">
           <i class="fas fa-heartbeat fa-3x"></i>
           <h2 class="count">23</h2>
           <p class="count-text">Направлений</p>
         </div>
         <div class="counter col-fourth end">
           <i class="fas fa-laptop-medical fa-3x"></i>
           <h2 class="count">145</h2>
           <p class="count-text">Оборудований</p>
         </div>
       </div>
      </br></br>
      <?php
     foreach($about_pages as $about){

     ?>
      <h3 style="background-color:#4286f4; color:white;"><?php echo $about['title'] ?></h3>
				<p style="font-size:16px"><?php echo $about['text'] ?></p>
        <!-- Images -->
				<div class="row">
					<div class="col-md-6">
						<img src="<?php echo $about['img'] ?>" alt="" class="thumbnail" height="200px">
					</div>
					<div class="col-md-6">
						<img src="<?php echo $about['img2'] ?>" alt="" class="thumbnail" height="200px">
					</div>
          <div class="col-md-6 col-md-offset-4">
						<img src="<?php echo $about['img3'] ?>" alt="" class="thumbnail" height="200px">
					</div>
				</div>
        <h3 style="background-color:#4286f4; color:white;"><?php echo $about['title2'] ?></h3>
        <p style="font-size:16px"><?php echo $about['text2'] ?></p>
        <h3 style="background-color:#4286f4; color:white;"><?php echo $about['title3'] ?></h3>
        <p style="font-size:16px"><?php echo $about['text3'] ?></p>
        <!-- Video -->
        <iframe width="560" height="315" src="<?php echo $about['video'] ?>"
        frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
         allowfullscreen>
       </iframe>
				<h3 style="background-color:#4286f4; color:white; font-family: Luminari, fantasy">Наши специалисты</h3>

				<div class="team">

					<div class="row">
            <?php
            foreach($doctors as $doctor){
              ?>
						<div class="col col-md-8">

							<img src="<?php echo $doctor['doctor_img'];?>" class="thumbnail" height="70px">
							<div class="caption">
								<p><?php echo $doctor['doctor_name'];?></p>
								<p><?php echo $doctor['name']; ?></p>
							</div>
						</div>
            <?php
          }
             ?>
				</div>

      </div>
      <?php
    }
       ?>
			</section>
		</div>
	</div>
</div>
</div>
  <footer><?php require_once 'footer.php'; ?></footer>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://use.fontawesome.com/releases/v5.8.1/js/all.js" data-auto-replace-svg="nest"></script>
  <script src="js/number.js"></script>

  </body>
</html>
