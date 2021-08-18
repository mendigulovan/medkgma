<?php
include_once('resources/init.php');
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
    <link href="css/style.css" type="text/css" rel="stylesheet" media="all">
    <link href="http://fonts.googleapis.com/css?family=Oswald:400,300" rel="stylesheet">

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
  </head>

<body>

    <!-- Header
    ================================================== -->
    <div class="wrapper container">
  <header>
    <div class="container">

      <div class="row">
        <div class="col-md-4">
          <a href="/"><img id="logo" src="images/icon.png" alt="logo"></a>
        </div>
        <div class="col-md-8">
          <h1>Админ панель</h1>
        </div>
      </div>
    </div>
    <div class="top-nav">
      <span class="menu"><img src="images/menu-icon.png" alt="" /></span>
      <ul class="nav1">
        <li><a href="admin.php">Главная</a></li>
        <li><a href="manage_category.php">Категории</a></li>
 			 <li><a href="pages.php" class="active">Страницы</a></li>
        <li><a href="Logout.php">Выйти</a></li>
      </ul>
      <!-- script-for-menu -->
      <script>
        $("span.menu").click(function() {
          $("ul.nav1").slideToggle(300, function() {
            // Animation complete.
          });
        });
      </script>
      <!-- /script-for-menu -->
    </div>
  </header>
</div>
  <div class="wrapper container">
  <div>
  <div id="sidebar" class="four columns">
  <span class="menu"><img src="images/menu-icon.png" alt=""/></span>
    <nav class="navbar navbar-default">
     <ul class="nav navbar-nav">
       <li><a href="pages.php">Главная</a></li>
       <li><a href="about_admin.php">О медцентре</a></li>
       <li><a href="uslugi_admin.php">Услуги</a></li>
       <li><a href="doctor_admin.php">Специалисты</a></li>
       <li class="active"><a href="prices_admin.php">Цены</a></li>
       <li><a href="akcii_admin.php">Акции</a></li>
       <li><a href="contacts_admin.php">Контакты</a></li>
     </ul>
  </nav>
  </div> <!-- end sidebar -->
  </div>


  <!-- Content
  ================================================== -->

   <div id="content-wrap">

   	<div class="row">

   		<div id="main" class="eight columns">
        <button type="submit" /><a href="add_akcii.php"><h3>Добавить цену</h3></a></button>
	   		<article class="entry">
					<header class="entry-header">
            <div class="work-title humble-title">
            <h3>Цены</h3><br/>
          </div>
					</header>


					<div class="entry-content">

         <?php
        foreach(get_price_categories() as $prices_categories){
        ?>
                   <h3 style=
                   "background: #cce5ff;
                   margin: 5px; color:black; font-size:16px"><?php echo $prices_categories['name'];?></h3>
                   <?php
                  foreach(get_prices() as $prices){
                    if($prices_categories['name'] == $prices['name']){
                  ?>
                      <p class="content" style=
                      "margin: 5px; color:black"><?php echo $prices['title'];?>
                      <?php echo str_repeat("&nbsp;", 3); echo $prices['price']; ?>
                    </p>
                    <menu>
                       <ul>
                           <li><a href='delete_post.php?id=<?php echo $post['post_id']; ?>' onclick='return confirm_delete()'><font color="red">Удалить</font></a>&nbsp;</li>
                           <li><a href='edit_post.php?id=<?php echo $post['post_id']; ?>' ><font color="blue">Обновить</font></a></li>
                       </ul>
                    </menu>
                  <?php
                    }
                  }
             ?>
    <?php
     }
     ?>
				</article> <!-- end entry -->

   		</div> <!-- end main -->

   </div> <!-- end content-wrap -->


   <!-- Footer
   ================================================== -->
   <footer>

      <div class="row">



      </div> <!-- End row -->

      <div id="go-top"><a class="smoothscroll" title="Back to Top" href="#top"><i class="fa fa-chevron-up"></i></a></div>

   </footer> <!-- End Footer-->


   <!-- Java Script
   ================================================== -->
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
   <script>window.jQuery || document.write('<script src="js/jquery-1.10.2.min.js"><\/script>')</script>
   <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>
   <script src="js/main.js"></script>

</body>

</html>
