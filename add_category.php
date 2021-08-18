<?php
include_once('resources/init.php');
if(isset($_POST['name'])){
    $name = trim($_POST['name']);

    if(empty($name)){
        $error = 'You must submit the category name';
    }
    else if(category_exists('name',$name)){
        $error = 'That category already exists';
    } else if(strlen($name)> 24){
        $error = 'The category name only be up to 24 characters only';
    }

    if(!isset($error)){
        add_category($name);
        header("Location:add_category.php");
        die();
    }
}

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
</header>
<!-- Submenu
================================================== -->
<div class="row">

    <ul class="list-group submenu">
      <?php
      foreach(get_categories() as $category){
      ?>
      <li class="list-group-item active"><a href="category.php?id=<?php echo $category['id'];?>"><?php echo $category['name']; ?></a></li>
      <?php
      }
      ?>
    </ul>

</div>

   <!-- Content
   ================================================== -->
   <div id="content-wrap">

   	<div class="row">

   		<div id="main" class="eight columns">

	   		<article class="entry">

	     <?php if(isset($error)){
            echo $error;
            } ?>
						<h1 class="entry-title">
							<h1>Добавить категорию</h1>
						</h1>

						<div class="entry-meta">
		<form action='' method='post'>
        <label for='name'>Название</label>
        <input type='text' name='name' />
        <input type='submit' value='Добавить категорию' />
		</form>
						</div>

            <form action="add_post.php">
            <button type="submit" class="btn btn-primary">Добавить пост</button>
            </form>


				</article> <!-- end entry -->

   		</div> <!-- end main -->

   	</div> <!-- end row -->

   </div> <!-- end content-wrap -->


   <!-- Footer
   ================================================== -->
   <footer>



   </footer> <!-- End Footer-->


   <!-- Java Script
   ================================================== -->
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
   <script>window.jQuery || document.write('<script src="js/jquery-1.10.2.min.js"><\/script>')</script>
   <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>
   <script src="js/main.js"></script>

</body>

</html>
