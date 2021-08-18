<?php
include_once('resources/init.php');

if(isset($_POST['title'],$_POST['contents'],$_POST['category'])){

    $errors = array();

    $title      = trim($_POST['title']);
    $contents   = trim($_POST['contents']);

    if(empty($title)){
     $errors[] = 'Напишите название';
    }
    else if(strlen($title)>255){
     $errors[] = 'Название очень длинное';
    }

    if(empty($contents)){
     $errors[] = 'Напишите текст';
    }
    if(!category_exists('id',$_POST['category'])){
    $errors[] = 'Категория не существует';
    }

    if(empty($errors)){
        add_post($title,$contents,$_POST['category']);

        $id = mysql_insert_id();

        header("Location:index.php?id={$id}");
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
   <!-- Content
   ================================================== -->
   <div id="content-wrap">

   	<div class="row">

   		<div id="main" class="eight columns">

	   		<article class="entry">

		<?php
        if(isset($errors) && !empty($errors)){
            echo"<ul><li>",implode("</li><li>",$errors),"</li></ul>";
        }
        ?>
						<h2 class="entry-title">
							<h1>Добавить текст</h1>
						</h2>

						<div class="entry-meta">
							        <form action='' method='post'>
     <div>
        <label for='title'>Название</label>
         <input type='text' name='title' value='<?php if(isset($_POST['title'])) echo $_POST['title']; ?>' />
     </div>
     <div>
         <label for='contents'>Содержание</label>
         <textarea name='contents' cols=20 rows=10><?php if(isset($_POST['contents'])) echo $_POST['contents']; ?></textarea>
      </div>
     <div>
       <label for='category'>Категория</label>
       <select name='category'>
        <?php
        foreach(get_categories() as $category){
         ?>
         <option value='<?php echo $category['id'] ?>'><?php echo $category['name'] ?></option>
         <?php
        }
        ?>
       </select>
     </div>
     <p><input type='submit' value='Добавить' /></p>
     </form>
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
