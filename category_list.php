<?php
include_once('resources/init.php');
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


<script type="text/javascript">
function confirm_delete()
{
return confirm("Are you sure you want to delete this record?");
}
</script>

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

   <!-- Content
   ================================================== -->
   <div id="content-wrap">

   	<div class="row">

   		<div id="main" class="eight columns">

	   		<article class="entry">
						<h2 class="entry-title">
							<h1>Список категорий</h1><br/>
						</h2>

						<div class="entry-meta">
    <?php
     foreach(get_categories() as $category){
     ?>
      <ul>
      <li><a href="category.php?id=<?php echo $category['id'];?>"><?php echo $category['name']; ?></a> -
      <a href="delete_category.php?id=<?php echo $category['id'];?>" onclick='return confirm_delete()'><font color="red">Удалить</font></a></li>
    </ul>
     <?php
     }
     ?>
						</div>

					<div class="entry-content">
						<p><!--insert here--></p>
					</div>


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
