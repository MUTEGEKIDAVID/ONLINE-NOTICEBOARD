<?php
session_start();

if(!isset($_SESSION['user_id'])){
    require('login_tools.php');
    load();
}

$page_title='cart';
include('includes/header.html');

if($_SERVER['REQUEST_METHOD']=='POST'){

    foreach($_POST['qty'] as $item_id=> $item_qty){
        //ensure values are integers.
        $id=(int)$item_id;
        $qty=(int)$item_qty;
        //change quantity or delete if zero

        if($qty==0){
            unset($_SESSION['cart'][$id]);
        }else if($qty>0){
            $_SESSION['cart'][$id]['quantity']=$qty;
        }
    }
}
//grand total variable initiallisation
$total=0;

//statement to display the content of the shopping cart

if(!empty($_SESSION['cart'])){
    require('connect_db.php');

    //retrieving data from the shop
    $q="SELECT * FROM shop where item_id IN(";
    foreach($_SESSION['cart'] as $id=>$value)
    {$q.=$id.',';}


    $q= substr($q,0,-1).") order by item_id ASC";
    $r=mysqli_query($dbc,$q);

    //statements to display the cart selections in a form that contains a table
     echo '<form action="cart.php" method="POST"><table>
     <tr><th  colspan="5">items in your cart</th></tr><tr>
     ';

     while($row=mysqli_fetch_array($r,MYSQLI_ASSOC)){
         //calculate sub totals and grand total.
         $subtotal=$_SESSION['cart'][$row['item_id']]['quantity'] * $_SESSION['cart'][$row['item_id']]['price'];
         $total+=$subtotal;


         //display row.
         echo "<tr><td>{$row['item_name']}</td>
         
         <td> <input type=\"text\" size=\"3\"
         name=\" qty[{$row['item_id']}]\"
         value=\" {$_SESSION['cart'][$row['item_id']]['quantity']}\"></td>
          <td>@{$row['item_cost']}=</td>

          <td>".number_format($subtotal,2)."</td></tr>";

          //display grand total 
        echo '<tr><td colspan="5"><tb><br>
        Grand total='.number_format($total,2).'</td></tr>
        </table><tb>
        <input type="submit" value="update my cart"><br>
        </form>';
        
        



     }

}
else{
    echo '<p> your cart is currently empty.</p>';
}

echo ' <p><a href="shop.php">shop</a>|
<a href="checkout.php?total='.$total.'">Checkout </a>|
<a href="home.php">Home</a>|
<a href="goodbye.php">logout</a>|';

include('includes/footer.html');

mysqli_close($dbc);


?>