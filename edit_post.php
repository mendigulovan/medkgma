<?php
include_once('resources/init.php');
$post = get_posts($_GET['id']);
if(isset($_POST['title'],$_POST['contents'],$_POST['category'])){

    $errors = array();

    $title      = trim($_POST['title']);
    $contents   = trim($_POST['contents']);

    if(empty($title)){
     $errors[] = 'You need to supply a title';
    }
    else if(strlen($title)>255){
     $errors[] = 'The title can not be longer than 255 characters';
    }

    if(empty($contents)){
     $errors[] = 'You need to supply some text';
    }
    if(!category_exists('id',$_POST['category'])){
    $errors[] = 'That category does not exists';
    }

    if(empty($errors)){
        edit_post($_GET['id'],$title,$contents,$_POST['category']);

        header("Location:index.php?id={$post[0]['post_id']}");
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
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <script type='text/javascript' src='ckeditor/samples/js/sample.js'></script>

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
<body>

   <!-- Content
   ================================================== -->
   <div id="content-wrap">

   	<div class="row">

   		<div id="main" class="eight columns">

	   		<article class="entry">
					<header class="entry-header">
	       <?php
        if(isset($errors) && !empty($errors)){
            echo"<ul><li>",implode("</li><li>",$errors),"</li></ul>";
        }
        ?>
						<h2 class="entry-title">
							<h2>Редактировать категорию</h2>
						</h2>

						<div class="entry-meta">
		        <form action = "control.php" method='post'>
     <div>
        <label for='title'>Название </label>
         <input type='text' name='title' value='<?php echo $post[0]['title']; ?>' />
     </div>
     <div>
         <label for='contents'>Текст </label>
         <textarea rows="40" class="ckeditor" name="ck_input" id="editor"><?php echo $post[0]['contents']; ?></textarea>
      </div>
     
     <p><input type='submit' value='Редактировать публикацию' /></p>
     </form>
						</div>

					</header>


					<div class="entry-content">
						<p><!--insert here--></p>
					</div>


				</article> <!-- end entry -->

   		</div> <!-- end main -->

   			<div class="widget widget_categories group">
   				<h3>Категории</h3>
   				<?php
             foreach(get_categories() as $category){
             ?>
              <p><a href="manage_category.php?id=<?php echo $category['id'];?>"><?php echo $category['name']; ?></a>
             <?php
             }
             ?>
				</div>
   	</div> <!-- end row -->
   </div> <!-- end content-wrap -->

   <!-- Java Script
   ================================================== -->
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
   <script>window.jQuery || document.write('<script src="js/jquery-1.10.2.min.js"><\/script>')</script>
   <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>
   <script src="js/main.js"></script>

</body>

</html>
