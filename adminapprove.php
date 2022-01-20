<?php
include_once 'connect_db.php';


$result = mysqli_query($dbc,"SELECT * FROM shop WHERE item_status ='pending'");
?>
<!DOCTYPE html>
<html>
 <head>
 <title> Approve items</title>
 </head>
<body>
<?php
if (mysqli_num_rows($result) >0) {
?>
  <table>
  
  <tr>
    <td>Item Name</td>
    <td>Item_img</td>
    <td>Cost</td>
    <td>Quantity</td>
    <td>Status</td>
    
  </tr>
<?php

while($row = mysqli_fetch_array($result)) {
?>
<tr>
    <td><?php echo $row["item_name"]; ?></td>
    <td><?php echo $row["item_img"]; ?></td>
    <td><?php echo $row["item_cost"]; ?></td>
    <td><?php echo $row["item_quantity"]; ?></td>
    <td><?php echo $row["item_status"]; ?></td>
    
    <form action="" method="post">
    <td><input type="submit" name="save" value=Approve>  <input type="submit" name="save" value=Reject>  </td> </form>
</tr>
<?php

}
?>
</table>
 <?php
}
else{echo "<br>No item available for approval<br>";}
?>


 </body>
</html>
<?php
if(isset($_POST['save']))
{
    $status="approved";
	$sql = "UPDATE shop
	        SET item_status= 'approved' ";
	 if (mysqli_query($dbc, $sql)) {
		echo "new item approved";
	

	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($dbc);
	 }
	 mysqli_close($dbc);
}
?>
<?php

echo '<a href="goodbye.php">logout</a>';


?>