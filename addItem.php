<!DOCTYPE html>

<?php

include_once 'database.php';
?>

<html>
  <body>
      <br/>
      <br>
      <center>
	<form method="post" action="">
		Item name:<br>
		<input type="text" name="itemName">
		<br>
		Cost:<br>
		<input type="number" name="cost">
		<br>
		Quantity:<br>
		<input type="number" name="qty">
        <br>
		Item type:<br>
		<select  name="type">
        <option value="Skincare">Skincare</option>
        <option value="Haircare">Haircare</option>
  
         </select>
         <input type="submit" name="save" value="submit">
		
	</form>

</center>
  </body>
</html>

<?php

if(isset($_POST['save']))
{	 
	 $itemName = $_POST['itemName'];
	 $cost = $_POST['cost'];
	 $qty= $_POST['qty'];
	 $type=$_POST['type'];

	 
	
	
	$sql = "INSERT INTO item (itemName,cost,quantity,Status,itemType)
	 VALUES ('$itemName','$cost','$qty','pending','$type')";
	 if (mysqli_query($conn, $sql)) {
		echo "New record created successfully !";
		header("Location: viewItem.php"); 

	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}
?>