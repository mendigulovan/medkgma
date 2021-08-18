<?php
session_start ();
if (empty ( $_SESSION ['email'] ))
	header ( 'Location:login.php' );
include_once('resources/init.php');


$queryPerson = "select * from person where email='" . $_SESSION ['email'] . "'";
$getPerson = mysqli_query ( $conn, $queryPerson );
$person = mysqli_fetch_array ( $getPerson );
$firstName = $person ['fname'];
$lastName = $person ['lname'];

/*$doctors = get_doctors(null,$_GET['id']);
$getdoctor = $doctors;
$firstDrId = mysqli_fetch_all ( $getdoctor );*/

/*$doctors = get_doctors(null,$_GET['id']);
$firstDrId = mysqli_fetch_all ( $doctors );*/

$querydoctor = "SELECT doctor.doctorid, doctor.doctor_name, doctor.doctor_cat
 								FROM doctor";
$getdoctor = mysqli_query ( $conn, $querydoctor );
$doctors = mysqli_fetch_all ( $getdoctor );
$firstDrId = $doctors [0] [0];


$queryHist = "SELECT appointment.patientid, person.fname, person.lname, appointment.date, appointment.prescription,
 							appointment.appid, person.phonenumber FROM appointment inner join patient on appointment.patientid=patient.patientid
							INNER JOIN person on patient.email=person.email where doctorid=$firstDrId and date <= CURDATE()
							ORDER BY appointment.date DESC";

$getHist = mysqli_query ( $conn, $queryHist );
$hist = mysqli_fetch_all ( $getHist );

$queryUpc = "SELECT appointment.patientid, person.fname, person.lname, appointment.date,
							TIME_FORMAT(appointment.time, '%H:%i'),  appointment.appid, person.phonenumber FROM appointment
							INNER JOIN patient on appointment.patientid=patient.patientid
							INNER JOIN person on patient.email=person.email where doctorid=$firstDrId and date > CURDATE()
							ORDER BY appointment.date, appointment.time";
$getUpc = mysqli_query ( $conn, $queryUpc );
$upc = mysqli_fetch_all ( $getUpc );
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
       <li><a href="admin.php" class="active">Главная</a></li>
       <li><a href="manage_category.php">Категории</a></li>
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
   <!--content-->
   <div class="content">
     <div class="container">
       <div class="content-grids">
         <div class="work-title humble-title">
           <h3>
             Добро пожаловать,<span><?php
             echo "$firstName $lastName";
             ?></span>
           </h3>
         </div>

         <div class="features-info">
           <div class="features-text">
             <h4>История записей</h4>
             <p>
               Выбрать врача:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select
                 id="chooseDrHist" class="btn1">

								 <?php
		 						foreach ( $doctors as $doc ) {
		 							echo "<option value='$doc[0]'> $doc[1] $doc[2] ($doc[3])</option>";
		 						}
		 						?>
             </select>
             </p>
             <script type="text/javascript">
             $("#chooseDrHist").change(function(){
               if (window . XMLHttpRequest) {
                 // code for IE7+, Firefox, Chrome, Opera, Safari
                 xmlhttp = new XMLHttpRequest ();
               } else {
                 // code for IE6, IE5
                 xmlhttp = new ActiveXObject ( "Microsoft.XMLHTTP" );
               }
               xmlhttp.onreadystatechange = function () {
                 if (xmlhttp . readyState == 4 && xmlhttp . status == 200) {
                   $("#histTable").html(xmlhttp . responseText);
                 }
               };
               xmlhttp . open ( "GET", "GetAppByDr.php?hist=1&upc=0&drId=" + document.getElementById("chooseDrHist").value, true );
               xmlhttp . send ();
             });
             </script>
             <div id="histTable" class='tg-wrap'>
               <?php

               if (count ( $hist ) > 0) {
                 echo "
               <table id='tg-cHuKU1' class='tg'>
                   <tr>

                     <th>Пациент</th>
                     <th>Дата</th>
                     <th>Диагноз</th>
                     <th>Номер телефона</th>
										 <th>Оплата</th>

                   </tr>
								";

                 foreach ( $hist as $app ) {

                   echo "<tr><td>$app[0] - $app[1] $app[2]</td><td>$app[3]</td><td>$app[4]</td><td>$app[6]</td>";
                   $queryPayment = "select * from paymenthistory where appid=$app[5]";
                   $getPayment = mysqli_query ( $conn, $queryPayment );
                   $payment = mysqli_fetch_array ( $getPayment );
                   $amount = $payment ['amount'];
                   if ($amount) {
                     echo "<td>$amount</td>";
                   } else {
											/*echo "<form action=savepaym.php method='post'><input type='number' name='amount'>
											<input type='hidden' name='apid' value='$app[0]' />
											&nbsp;&nbsp;&nbsp;&nbsp;<input class='btn1' type='submit' value='Сохранить'></form>";*/
											echo "<td><input type='number'>&nbsp;&nbsp;&nbsp;&nbsp;<button class='btn1'>Сохранить</button></td>";
									}
									echo "</tr>";
								}

			         echo "</table>";
			        } else {
			            echo "<p>Нет записей</p>";
			        }

               ?>
             </div>
           </div>
         </div>
         <div class="features-info">
           <div class="features-text">
             <h4>Ближайщие записи</h4>
             <p>
               Выбрать врача:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select
                 id="chooseDrUpc" class="btn1">
             <?php
             foreach ( $doctors as $doc ) {
               echo "<option value='$doc[0]'> $doc[1] $doc[2] ($doc[3])</option>";
             }
             ?>
             </select>
             </p>
             <script type="text/javascript">
             $("#chooseDrUpc").change(function(){
               if (window . XMLHttpRequest) {
                 // code for IE7+, Firefox, Chrome, Opera, Safari
                 xmlhttp = new XMLHttpRequest ();
               } else {
                 // code for IE6, IE5
                 xmlhttp = new ActiveXObject ( "Microsoft.XMLHTTP" );
               }
               xmlhttp.onreadystatechange = function () {
                 if (xmlhttp . readyState == 4 && xmlhttp . status == 200) {
                   $("#upcTable").html(xmlhttp . responseText);
                 }
               };
               xmlhttp . open ( "GET", "GetAppByDr.php?upc=1&hist=0&drId=" + document.getElementById("chooseDrUpc").value, true );
               xmlhttp . send ();
             });
             </script>
             <div id="upcTable" class='tg-wrap'>
               <?php
               if (count ( $upc ) > 0) {
                 echo "
               <table id='tg-cHuKU' class='tg'>
                   <tr>
                     <th>Пациент</th>
                     <th>Дата</th>
                     <th>Время</th>

                     <th></th>
                   </tr>";

                 foreach ( $upc as $app ) {
                   echo "<tr><td>$app[0] - $app[1] $app[2]</td><td>$app[3]</td><td>$app[4]</td>";
                   echo "<td><a href='makeAppointment.php?appId=" . $app [5] . "'>Изменить</a><br />";
                   echo "<a href='cancelApp.php?appId=" . $app [5] . "'>Отменить</a></td></tr>";
                 }
                 echo "</table>";
               } else {
                 echo "<p>Нет ближайших записей</p>";
               }
               ?>
             </div>
           </div>
         </div>
				 <div class="features-info">
           <div class="features-text">
             <h4>История всех платежей</h4>
					</div>
					<div id="upcTable" class='tg-wrap'>
						<?php

							echo "
						<table id='tg-cHuKU' class='tg'>
								<tr>
									<th>Пациент</th>
									<th>Дата</th>
									<th>Оплата</th>
									<th></th>
								</tr>";

								foreach ( $hist as $app ) {
									$queryPayment = "select * from paymenthistory";
	 	 							 $getPayment = mysqli_query ( $conn, $queryPayment );
	 	 							 $payment = mysqli_fetch_array ( $getPayment );
	 	 							 $amount = $payment ['amount'];
									 if ($amount) {

	 							 echo "<tr><td>$app[0] - $app[1] $app[2]</td><td>$app[3]</td><td>$amount</td>";

	 							 }
	 						}

	 						 echo "</table>";
	 					 ?>
					</div>
				</div>

         <div class="clearfix"></div>
       </div>
     </div>
   </div>
   <script type="text/javascript" charset="utf-8">var TgTableSort=window.TgTableSort||function(n,t){"use strict";function r(n,t){for(var e=[],o=n.childNodes,i=0;i<o.length;++i){var u=o[i];if("."==t.substring(0,1)){var a=t.substring(1);f(u,a)&&e.push(u)}else u.nodeName.toLowerCase()==t&&e.push(u);var c=r(u,t);e=e.concat(c)}return e}function e(n,t){var e=[],o=r(n,"tr");return o.forEach(function(n){var o=r(n,"td");t>=0&&t<o.length&&e.push(o[t])}),e}function o(n){return n.textContent||n.innerText||""}function i(n){return n.innerHTML||""}function u(n,t){var r=e(n,t);return r.map(o)}function a(n,t){var r=e(n,t);return r.map(i)}function c(n){var t=n.className||"";return t.match(/\S+/g)||[]}function f(n,t){return-1!=c(n).indexOf(t)}function s(n,t){f(n,t)||(n.className+=" "+t)}function d(n,t){if(f(n,t)){var r=c(n),e=r.indexOf(t);r.splice(e,1),n.className=r.join(" ")}}function v(n){d(n,L),d(n,E)}function l(n,t,e){r(n,"."+E).map(v),r(n,"."+L).map(v),e==T?s(t,E):s(t,L)}function g(n){return function(t,r){var e=n*t.str.localeCompare(r.str);return 0==e&&(e=t.index-r.index),e}}function h(n){return function(t,r){var e=+t.str,o=+r.str;return e==o?t.index-r.index:n*(e-o)}}function m(n,t,r){var e=u(n,t),o=e.map(function(n,t){return{str:n,index:t}}),i=e&&-1==e.map(isNaN).indexOf(!0),a=i?h(r):g(r);return o.sort(a),o.map(function(n){return n.index})}function p(n,t,r,o){for(var i=f(o,E)?N:T,u=m(n,r,i),c=0;t>c;++c){var s=e(n,c),d=a(n,c);s.forEach(function(n,t){n.innerHTML=d[u[t]]})}l(n,o,i)}function x(n,t){var r=t.length;t.forEach(function(t,e){t.addEventListener("click",function(){p(n,r,e,t)}),s(t,"tg-sort-header")})}var T=1,N=-1,E="tg-sort-asc",L="tg-sort-desc";return function(t){var e=n.getElementById(t),o=r(e,"tr"),i=o.length>0?r(o[0],"td"):[];0==i.length&&(i=r(o[0],"th"));for(var u=1;u<o.length;++u){var a=r(o[u],"td");if(a.length!=i.length)return}x(e,i)}}(document);document.addEventListener("DOMContentLoaded",function(n){TgTableSort("tg-cHuKU")});document.addEventListener("DOMContentLoaded",function(n){TgTableSort("tg-cHuKU1")});</script>
   <!--//content-->

   <a href="#" id="toTop" style="display: block;"> <span id="toTopHover"
     style="opacity: 1;"> </span></a>
   <!--//smooth-scrolling-of-move-up-->



   <!-- Footer
   ================================================== -->


</body>

</html>
