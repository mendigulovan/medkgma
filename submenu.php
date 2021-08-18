<ul class="list-group submenu">
  <?php
  foreach(get_categories() as $category){
  ?>
   <li class="list-group-item active">
     <a href="category.php?id=<?php echo $category['id'];?>"><?php echo $category['name']; ?>
   </li>
 <?php
   }
 ?>
</ul>
