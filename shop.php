<?php

session_start();

if(!isset($_SESSION['user_id']))
{
    require('login_tools.php');
    load();
}

$page_title = 'Shop';
include ('includes/header.html');

require('connect_db.php');

$q = "SELECT *FROM shop WHERE item_status='approved'";
$r = mysqli_query($dbc, $q);
if (mysqli_num_rows($r) > 0 )
{
    echo '<table><tr>';
    while ($row = mysqli_fetch_array( $r, MYSQLI_ASSOC))
    {
        echo '<td><strong><a href="buy.php?id='.$row['item_id'].'">'.$row['item_name'].'</a></strong><br>
        <img src='.$row['item_img'].'><br>
        UGX '.$row['item_cost'].'<br>
        '.$row['item_quantity'].'<br>
        <a href="added.php?id='.$row['item_id'].'">Add to Cart</a>
        </td>';
    }
    echo '</tr><table>';
    mysqli_close($dbc);
}
else {
    echo '<p>There are currently no items in this shop.</p>';
}

echo '<p><a href="home.php">Home</a>|
<a href="cart.php">view cart</a>|
<a href="goodbye.php">Logout</a></p>';

include('includes/footer.html');

?>