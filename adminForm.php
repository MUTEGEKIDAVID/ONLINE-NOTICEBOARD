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
		First name:<br>
		<input type="text" name="first">
		<br>
		Last name:<br>
		<input type="text" name="last">
		<br>
		Username:<br>
		<input type="text" name="name">
        <br>
		
		Password:<br>
		<input type="password" name="pass">
		<br>

		Email Id:<br>
		<input type="email" name="email">
		<br><br>
		<input type="submit" name="save" value="submit">
	</form>

</center>
  </body>
</html>

<?php

if(isset($_POST['save']))
{	 
	 $firstName = $_POST['first'];
	 $lastName = $_POST['last'];
	 $user= $_POST['name'];
	 $email = $_POST['email'];
	 $pass = $_POST['pass'];

	 
	
	
	$sql = "INSERT INTO admin (firstName,lastName,userName,password,email)
	 VALUES ('$firstName','$lastName','$user','$pass','$email')";
	 if (mysqli_query($conn, $sql)) {
		echo "New record created successfully !";
		header("Location: index.php"); 

	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}
?>