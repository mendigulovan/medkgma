<?php
include_once('resources/init.php');
?>
<?php
session_start ();
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
   <link href="css/style.css" rel="stylesheet">
   <link href="http://fonts.googleapis.com/css?family=Oswald:400,300" rel="stylesheet">
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

   <script
    src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
   <!-- //Custom Theme files -->
   <!-- js -->
   <script src="js/jquery.min.js"></script>
   <script src="js/modernizr.custom.js"></script>
</head>

<body>

   <!-- Header
   ================================================== -->
   <div class="wrapper container">
 <header>
   <div class="container">
     <div class="row">
       <div class="wrapper container">
         <?php require_once 'header.php'; ?>
       <div class="col-md-8">
         <h1>Админ панель</h1>
       </div>
     </div>
   </div>
 </header>

 <div class="blog">
   <div class="container">
     <div class="work-title">
       <h3>Зайти в личный кабинет администратора</h3>
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
         <input type="submit" id="login" value="Sign in"></input>
       </form>

     </div>
   </div>
 </div>
 <!--//blog-->
