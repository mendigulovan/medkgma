<?php
include_once('resources/init.php');
include('functions.php');
$prices = get_prices(null,$_GET['id']);
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

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
				<li><a href="doctor.php">Специалисты</a></li>
				<li class="active"><a href="prices.php">Цены</a></li>
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

      <section class="col-md-17">
        <!-- Content
       ================================================== -->
       <div>
         <h2 style="background-color:#4286f4; color:white;">Категории цен</h2>
         	<ul>
        <?php
       foreach(get_price_categories() as $prices_categories){
       ?>

              <a class="category">
                  <li style=
                  "background: #cce5ff;
                  margin: 5px; color:black; font-size:16px"><?php echo $prices_categories['name'];?></li></a>
                  <?php
                 foreach(get_prices() as $prices){
                   if($prices_categories['name'] == $prices['name']){
                 ?>
                     <p class="content" style=
                     "margin: 5px; color:black"><?php echo $prices['title'];?>
                     <?php echo str_repeat("&nbsp;", 3); echo $prices['price']; ?>
                   </p>

                 <?php
                   }
                 }
               }
            ?>

      </ul>
      <script>
      $(function(){
        $('.content').hide();
        $('.category').click(function(){
          $(this).next().slideToggle('slow').siblings('p:visible').slideUp('slow');
        });

     });

      </script>
			</section>
		</div>
	</div>
  </div>
  <footer><?php require_once 'footer.php'; ?></footer>

  </body>
</html>
