<?php
session_start();

//if(!isset($_session['user_id'])){
   // require('login_tools.php');
   // load();}?>
<?php

$page_title='cart Addition';
include('includes/header.html');

if(isset($_GET['id'])){ $id=$_GET['id'];}
 require('connect_db.php');

 $q="SELECT * FROM shop WHERE item_id=$id";
 $r=mysqli_query($dbc,$q);

 if(mysqli_num_rows($r)==1){
     $row=mysqli_fetch_array($r,MYSQLI_ASSOC);

     if(isset($_SESSION['cart'][$id])){
         $_SESSION['cart'][$id]['quantity']++;
         echo '<p> Another'.$row["item_name"].'has been added to your cart</p>';
     }
     else{
         $_SESSION['cart'][$id]=array('quantity'=>1,'price'=>$row['item_cost']);
         echo '<p> A'.$row["item_name"].'has been added to your cart</p>';
     }
 }mysqli_close($dbc);

 echo '<p><a href="shop.php">shop</a>|
 <a href="cart.php">view cart</a>|
 <a href="home.php">Home</a>|
 <a href="goodbye.php">Logout</a></p>';
 include('includes/footer.html');




?>