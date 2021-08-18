<?php
include_once('resources/init.php');
include('functions.php');
include('blog.php');
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

  </head>
  <body>
    <!-- Header
   ================================================== -->
    <div class="wrapper container">
  <?php require_once 'header.php'; ?>

  <!-- Navbar
   ================================================== -->
   <span class="menu"><img src="images/menu-icon.png" alt=""/></span>
  <nav class="navbar navbar-default">
      <ul class="nav navbar-nav">
        <li class="active"><a href="/">Главная</a></li>
        <li><a href="about.php">О медцентре</a></li>
        <li><a href="uslugi.php">Услуги</a></li>
        <li><a href="doctor.php">Специалисты</a></li>
        <li><a href="prices.php">Цены</a></li>
        <li><a href="akcii.php">Акции</a></li>
        <li><a href="contacts.php">Контакты</a></li>
      </ul>
		</nav>
    <!-- script-for-menu -->
     <script>
       $( "span.menu" ).click(function() {
       $( "ul.nav" ).slideToggle( 300, function() {
       // Animation complete.
        });
       });
    </script>
    <!-- /script-for-menu -->

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


      <!-- Slider
     ================================================== -->
			<section class="col-md-17">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner">
            <div class="item active">
              <img src="images/img1.png" alt="slider" style="width:100%;">
            </div>

            <div class="item">
              <img src="images/pic1.png" alt="slider" style="width:100%;">
            </div>

            <div class="item">
              <img src="images/img3.jpg" alt="slider" style="width:100%;">
            </div>
          </div>

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
  <div>
    <!-- Termin -->
    <div class="row">
      <div class="col-md-8">
      <form action="termin.php">
      <button type="submit" class="btn btn-primary btn-lg">Записаться к врачу</button>
      </form>
      </div>
    </div>
  </br>


        <!-- News block
       ================================================== -->
        <div id="newsBlock">
         <div id="newsticker">
           <h3 style="background-color:#4286f4; color:white;">Наши новости</h3>
           <ul>
             <div class="row">
             <div class="col-md-6">
             <?php
             foreach(get_news() as $news){
             ?>

             <li>
                <img id="img_news" width="200px" src="<?php echo $news['img']; ?>"/>
                <span><?php echo $news['date']; ?></span>
                <a href=""><?php echo $news['title']; ?></a>
                <p><?php echo $news['text']; ?></p>
              </li>
            <?php
              }
            ?>
                </div>
              </div>
           </ul>
         </div>
       </div>
       <!-- Content
      ================================================== -->
      <div class="col-md-12">
        <h2 style="background-color:#4286f4; color:white;">Учебно-Лечебный Научный Медицинский центр</h2>
      <img id="mainpage" src="/images/glav.jpg" height="200px">
      <h5>Директор Медицинского центра, доктор медицинских наук Искаков Муктарбек Бакбурович</h5>
    <h3 style="background-color:#4286f4; color:white;">Направление деятельности</h3>
      <ul>
        <li>внедрение и использование на практике медицинских инновационных и современных информационных технологий;</li>

        <li>расширение спектра внебюджетных источников финансирования в систему здравоохранения;</li>

         <li>проведение образовательных программ (семинаров, конференций, мастер-классов) посвященным методам профилактики и лечения в рамках постдипломного образования</li>
      </ul>

.
         </br>
         <!-- Video -->
         <iframe width="300" height="200" src="https://www.youtube.com/embed/V_yF5oJbTxA"
         frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
          allowfullscreen>
        </iframe>
        <p>Начиная с 1999 года Медицинский центр КГМА ведет научную и лечебную деятельность.</p>
    </div>
  </br>
    </section>

  </div>
  </div> <!-- end row -->
</div> <!-- end wrapper container -->

  <footer><?php require_once 'footer.php'; ?></footer>


  </body>
</html>
