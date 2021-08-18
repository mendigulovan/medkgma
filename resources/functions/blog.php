<?php

function add_post($title,$contents,$category){
    $title      = mysql_real_escape_string($title);
    $contents   = mysql_real_escape_string($contents);
    $img        = mysql_real_escape_string($img);
    $category   = (int)$category;

    mysql_query("INSERT INTO `posts` SET
                `cat_id`     = {$category},
                `title`      = '{$title}',
                `contents`   = '{$contents}");
}

function edit_post($id,$title,$contents,$category){
    $id         = (int)$id;
    $title      = mysql_real_escape_string($title);
    $contents   = mysql_real_escape_string($contents);
    $category   = (int)$category;

    mysql_query("UPDATE `posts` SET
                `cat_id`     = {$category},
                `title`      = '{$title}',
                `contents`   = '{$contents}'
                WHERE `id` = {$id}");
}

function add_category($name){
  $name = mysql_real_escape_string($name);

  mysql_query("INSERT INTO `categories` SET `name` = '{$name}'");
}

function delete($table, $id){
    $table = mysql_real_escape_string($table);
    $id    = (int)$id;

    mysql_query("DELETE FROM `{$table}` WHERE `id`= {$id} ");

}

function get_posts($id = null, $cat_id = null){
    $posts = array();
    $query = "SELECT
              `posts`.`id` AS `post_id` ,
               `categories`.`id` AS `category_id`,
               `title`,`contents`, `img`,
               `categories`.`name`
               FROM `posts`
               INNER JOIN `categories` ON `categories`.`id` = `posts`.`cat_id` " ;
    if(isset($id)){
        $id = (int)$id;
        $query .= " WHERE `posts`.`id` = {$id} ";
             }
    if(isset($cat_id)){
        $cat_id = (int)$cat_id;
        $query .= " WHERE `cat_id` = {$cat_id} ";
             }

    $query .= "ORDER BY `post_id` DESC";

    $query = mysql_query($query);

    while($row = mysql_fetch_assoc($query)){
    $posts[] = $row;
   }
   return $posts;
}

function get_categories($id = null){
   $categories = array();

   $query = mysql_query("SELECT `id`,`name` FROM `categories`");

   while($row = mysql_fetch_assoc($query)){
    $categories[] = $row;
   }

   return $categories;
}

function get_pages($id = null){
   $pages = array();

   $query = mysql_query("SELECT `id`,`name` FROM `pages`");

   while($row = mysql_fetch_assoc($query)){
    $pages[] = $row;
   }

   return $pages;
}

function get_news($id = null){
   $news = array();

   $query = mysql_query("SELECT * FROM `news`");

   while($row = mysql_fetch_assoc($query)){
    $news[] = $row;
   }

   return $news;
}

function get_slider_img($id = null){
   $slider_img = array();

   $query = mysql_query("SELECT * FROM `slider_img`");

   while($row = mysql_fetch_assoc($query)){
    $slider_img[] = $row;
   }

   return $slider_img;
}

function get_uslugi($id = null){
   $uslugi = array();

   $query = mysql_query("SELECT * FROM `uslugi`");

   while($row = mysql_fetch_assoc($query)){
    $uslugi[] = $row;
   }

   return $uslugi;
}

function category_exists($field,$name){
    $name = mysql_real_escape_string($name);
    $field = mysql_real_escape_string($field);

    $query = mysql_query("SELECT COUNT(1) FROM categories WHERE `{$field}` = '{$name}'");

    return(mysql_result($query,0) == 0)?false : true;
}

function get_prices($id = null, $cat_id = null){
    $prices = array();
    $query = "SELECT
              `prices`.`id` AS `price_id` ,
               `price_categories`.`id` AS `category_id`,
               `title`,`price`,
               `price_categories`.`name`
               FROM `prices`
               INNER JOIN `price_categories` ON `price_categories`.`id` = `prices`.`cat_id` " ;
    if(isset($id)){
        $id = (int)$id;
        $query .= " WHERE `price`.`id` = {$id} ";
             }
    if(isset($cat_id)){
        $cat_id = (int)$cat_id;
        $query .= " WHERE `cat_id` = {$cat_id} ";
             }

    $query = mysql_query($query);

    while($row = mysql_fetch_assoc($query)){
    $prices[] = $row;
   }
   return $prices;
}

function get_doctors($id = null, $cat_id = null){
    $doctors = array();
    $query = "SELECT
              `doctor`.`doctorid` AS `doctor_id` ,
               `categories`.`id` AS `category_id`,
               `doctor_name`,`doctor_img`,
               `starttime`,`endtime`,
               `categories`.`name`
               FROM `doctor`
               INNER JOIN `categories` ON `categories`.`id` = `doctor`.`doctor_cat` " ;
    if(isset($id)){
        $id = (int)$id;
        $query .= " WHERE `doctor`.`id` = {$id} ";
             }
    if(isset($doctor_cat)){
        $doctor_cat = (int)$doctor_cat;
        $query .= " WHERE `doctor_cat` = {$doctor_cat} ";
             }

    $query = mysql_query($query);

    while($row = mysql_fetch_assoc($query)){
    $doctors[] = $row;
   }
   return $doctors;
}

function get_price_categories($id = null){
   $prices_categories = array();

   $query = mysql_query("SELECT * FROM `price_categories`");

   while($row = mysql_fetch_assoc($query)){
    $prices_categories[] = $row;
   }

   return $prices_categories;
}

function get_akcii($id = null){
   $akcii = array();

   $query = mysql_query("SELECT * FROM `akcii`");

   while($row = mysql_fetch_assoc($query)){
    $akcii[] = $row;
   }

   return $akcii;
}

function get_about($id = null){
   $about_pages = array();

   $query = mysql_query("SELECT * FROM `about_page`");

   while($row = mysql_fetch_assoc($query)){
    $about_pages[] = $row;
   }

   return $about_pages;
}
