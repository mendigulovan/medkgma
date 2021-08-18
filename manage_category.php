<?php
include_once('resources/init.php');
$posts = get_posts(null,$_GET['id']);
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

    <script type="text/javascript">
          function confirm_delete()
          {
            return confirm("Are you sure you want to delete this record?");
          }
    </script>
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
        <li><a href="manage_category.php" class="active">Категории</a></li>
 			 <li><a href="pages.php">Страницы</a></li>
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
  <!-- Content
  ================================================== -->

   <div id="content-wrap">
   	<div class="row">
   		<div id="main" class="eight columns">
        <button type="submit" /><a href="add_category.php"><h3>Добавить категорию</h3></a></button>
	   		<article class="entry">
					<header class="entry-header">
	    <?php
     foreach($posts as $post){

     ?>

              <div class="work-title humble-title">
							<h3>Категория</h3><br/>
						</div>

						<div class="entry-meta">
	     <h2><a href='index.php?id=<?php echo $post['post_id']; ?>' ><?php echo $post['title']; ?></a></h2>
     <p>
       Текст
     </p>
     <div><?php echo nl2br($post['contents']); ?></div>
     <img src="<?php echo nl2br($post['img']); ?>" height="200px"/>
     <menu>
        <ul>
            <li><a href='delete_post.php?id=<?php echo $post['post_id']; ?>' onclick='return confirm_delete()'><font color="red">Удалить</font></a>&nbsp;</li>
            <li><a href='edit_post.php?id=<?php echo $post['post_id']; ?>' ><font color="blue">Обновить</font></a></li>
        </ul>
     </menu>
						</div>

					</header>


					<div class="entry-content">
						<p><!--insert here--></p>
					</div>

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
