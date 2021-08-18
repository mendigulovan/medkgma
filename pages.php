<?php
include_once('resources/init.php');
$news = get_news(null,$_GET['id']);
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
   <link href="css/bootstrap.css" type="text/css" rel="stylesheet"
 		media="all">
 	<link href="css/style.css" type="text/css" rel="stylesheet" media="all">
 	<link href="css/styles.css" type="text/css" rel="stylesheet" media="all">
 	<!--web-font-->
 	<link
 		href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
 		rel='stylesheet' type='text/css'>
 	<link
 		href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
 		rel='stylesheet' type='text/css'>
 	<!--//web-font-->

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
  <div class="col-md-12">
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
            <div class="work-title humble-title">
            <h3>Страницы</h3></br>
            </div>
        <div>
        <div id="sidebar" class="four columns">
          <span class="menu"><img src="images/menu-icon.png" alt=""/></span>
            <nav class="navbar navbar-default">
             <ul class="nav navbar-nav">
               <li class="active"><a href="/">Главная</a></li>
               <li><a href="about_admin.php">О медцентре</a></li>
               <li><a href="uslugi_admin.php">Услуги</a></li>
               <li><a href="doctor_admin.php">Специалисты</a></li>
               <li><a href="prices_admin.php">Цены</a></li>
               <li><a href="akcii_admin.php">Акции</a></li>
               <li><a href="contacts_admin.php">Контакты</a></li>
             </ul>
       		</nav>
   		</div> <!-- end sidebar -->
    </div>
      <div id="content-wrap">

       <div class="row">

         <div id="main" class="eight columns">
           <button type="submit" /><a href="add_news.php"><h3>Добавить новость</h3></a></button>
           <article class="entry">
             <header class="entry-header">
               <div class="work-title humble-title">
               <h3>Новости</h3><br/>
             </div>
             </header>

             <div class="entry-content">
               <div class="row">

                   <?php
                  foreach($news as $news){

                  ?>
                  <div class="col-md-8">
                         <div class="entry-meta">
                    <h2><?php echo $news['title']; ?></h2>
                    <p><?php echo $news['text']; ?></p>
                    <img src="<?php echo $news['img']; ?> " height="200px"/>
                    <p><?php echo $news['date']; ?></p>
                  <menu>
                     <ul>
                         <li><a href='delete_post.php?id=<?php echo $post['post_id']; ?>' onclick='return confirm_delete()'><font color="red">Удалить</font></a>&nbsp;</li>
                         <li><a href='edit_post.php?id=<?php echo $post['post_id']; ?>' ><font color="blue">Обновить</font></a></li>
                     </ul>
                  </menu>
                         </div>
                 </div>
                 <?php
                  }
                  ?>
      </div>
    </div>
           </article> <!-- end entry -->

         </div> <!-- end main -->

      </div> <!-- end content-wrap -->





   <!-- Java Script
   ================================================== -->
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
   <script>window.jQuery || document.write('<script src="js/jquery-1.10.2.min.js"><\/script>')</script>
   <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>
   <script src="js/main.js"></script>

</body>

</html>
