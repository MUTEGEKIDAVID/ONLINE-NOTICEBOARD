<?php
$page_title = 'AdminRegister';
include('includes/header.html');

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    require ('connect_db.php');
    $errors = array();

    if (empty($_POST['first_name']))
    { $errors[] = 'Enter your first name.';}
    else
    {$fn = mysqli_real_escape_string($dbc,
        trim($_POST['first_name']));}
    
    if (empty($_POST['last_name']))
    { $errors[] = 'Enter your last name.';}
    else 
    { $ln = mysqli_real_escape_string( $dbc,
        trim( $_POST['last_name']));}

        if (empty($_POST['adminID']))
    { $errors[] = 'Enter your admin_ID.';}
    else 
    { $ad = mysqli_real_escape_string( $dbc,
        trim( $_POST['adminID']));}

    if (empty($_POST['email']))
    { $errors[] = 'Enter your email address.';}
    else 
    { $e = mysqli_real_escape_string( $dbc,
        trim( $_POST['email']));}
    
    if (!empty($_POST['pass1']))
    {
        if ( $_POST['pass1'] != $_POST['pass2'])
        { $errors[] = 'Passwords do not match.';}
        else
        { $p = mysqli_real_escape_string( $dbc,
            trim($_POST['pass1']));}
    } else { $errors[] = 'Enter your password.';}

    if ( empty( $errors))
    {
        $q = "SELECT admin_ID FROM admins WHERE email='$e'";
        $r = mysqli_query($dbc, $q);
        if ( mysqli_num_rows($r) != 0)
        {
            $errors[] = 'Email address already registered.
            <a href="adminlogin.php">Login</a>';
        }
    }

    if (empty($errors)) 
    {
        $q = "INSERT INTO admins (first_name, last_name,admin_ID, email, pass, reg_date)
              VALUES ('$fn', '$ln','$ad', '$e',SHA1('$p'), NOW())";
        $r = mysqli_query ($dbc, $q);
        
        if ($r) 
        {
            echo '<h1>Registered!</h1>
            <p>You are now registered.</p>
            <p><a href="adminlogin.php">Login</a></p>';
        }
        mysqli_close($dbc);
        include ('includes/footer.html');
        exit();
    }
    else
    {
        echo '<h1>Error!</h1>
        <p id="err_msg">The following error(s) occurred:<br>';
        foreach ($errors as $msg)
        {
            echo "-$msg<br>"; 
        }
        echo 'Please try again.</p>';
        mysqli_close($dbc);
    }
}?>

<html>
    <head>
    <style>

*{
    margin:0;
    padding:0;
}
body{
    background-image: url(dramatic-colorful-sunset-sky-22018170.jpg);
    color:#FFFFFF;
    background-position: center;
    background-size: cover;
    font-family: monospace;
    margin-top: 40px;
    margin-left: 60px;
}
.header{
    width: 800px;
    background-color: rgb(0,0,0,6);
    margin:auto;
    color:#FFFFFF;
    padding : 10px 0px 10px 0px;
    text-align: center;
    border-radius: 15px 15px 0px 0px;
}




.form_body{
    background-color: rgb(0,0,0,0.5);
    width:800px;
    margin: auto;
    height:400px;
}
form{
    padding: 10px;
}



p input[type="submit"]{
    border:none;
    outline:none;
    height:40px;
    background:red;
    color:#fff;
    width:100%;
    font-size: 18px;
    border-radius: 20px;
    align-items:center;
    transform:translate(0%,-85%);
}
p input[type="submit"]:hover{
    cursor: pointer;
    background:grey;
    color:black;
}


.footer{
    width: 800px;
    background-color: rgb(0,0,0,6);
    margin:auto;
    color:#FFFFFF;
    padding : 10px 0px 10px 0px;
    text-align: center;
    border-radius: 0px 0px 15px 15px;}

    p{
        padding :20px 20px 40px 0px;
    }
    input{
        height: 30px;
        width:250px;
    }
</style>
</head>
    <body>
        <div class="header"><h1>Admin Registration</h1></div>
        <div class="form_body">
        <form action="adminregister.php" method="POST">
            <p>
                First Name: <input type="text" name="first_name" 
                value="<?php if (isset( $_POST['first_name']))
                echo $_POST['first_name'];?>">

                Last Name: <input type="text" name="last_name" 
                value="<?php if (isset( $_POST['last_name']))
                echo $_POST['last_name'];?>">
            </p>    
            <p>
                ADMIN_ID:<input type="text" name="adminID" value="<?php if(isset($_POST['adminID']))
                echo $_POST['adminID'];?>">
            </p>
            <p>
                Email Address: <input type="text" name="email" 
                value="<?php if (isset( $_POST['email']))
                echo $_POST['email'];?>">
            </p>
            <p>
                Password: <input type="password" name="pass1" 
                value="<?php if (isset( $_POST['pass1']))
                echo $_POST['pass1'];?>">

                Confirm Password: <input type="password" name="pass2" 
                value="<?php if (isset( $_POST['pass2']))
                echo $_POST['pass2'];?>">
            </p>
            <p>
                <input type="submit" value="Register">
            </p>    
            </p>
        </form> </div>
<div class="footer">
<?php include ('includes/footer.html'); ?>
</div>
    </body>

</html>

