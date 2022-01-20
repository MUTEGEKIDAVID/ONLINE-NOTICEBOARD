<?php

$page_title = 'Login';
include ('includes/header.html');

if (isset($errors) && !empty($errors))
{
    echo '<p id="err_msg">Oops! There was a problem:<br>';
    foreach ($errors as $msg)
    {
        echo "-$msg<br>";
    }
    echo 'Please try again or <a href="register.php">Register</a></p>';
}
?>

<html>
    <head>
        <style>
        .loginbox{
            width:400px;
    height:350px;
    background:#000;
    color:white;
    top:50%;
    left:50%;
    position:absolute;
    transform:translate(-50%,-50%);
    box-sizing:border-box;
    padding: 70px 30px;
    justify: center;
    border-radius: 10%;

        }
        body{
            
    margin:0;
    padding:0; 
    
    background-image: url(dramatic-colorful-sunset-sky-22018170.jpg);
    background-size: cover;
    background-position: center;
    font-family: sans-serif;

        }
        .avator{
    width:100px;
    height:100px;
    border-radius:50%;
    position:absolute;
    top: -50px;
    left: 150px;
}
#password{
    width:210px
}
#login{
    transform:translate(35%,-40%);
}
#register{
    transform:translate(70%,50%);
    width:150px;
}
p input[type="submit"]{
    width:200px;
    border-radius:30px;
    height:30px;
    transform:translate(40%,50%);
    
}
p input[type="submit"]:hover{
    background:grey;
}
#register:hover{
    background:red;
}
#footer{
    transform:translate(0%,3000%);
}



        </style>
    
    <head>
    <body>
        <div class="loginbox">
        <img src="avator.png"  alt="avator" class="avator ">
        <h1 id="login">Login</h1>
        <form action="login_action.php" method="POST">
            <p>
                Email Address: <input type="text" id="email" name="email">
            </p>
            <p>
                Password: <input type="password" id="password"name="pass">
            </p>
            <p >
                <input type="submit" class="login" value="Login">
            </p>
        </form>
        <p id="register"><a href="register.php" > click here to register</a></p></div>

        <div id="footer">
        <?php include ('includes/footer.html');?>
        </div>
    </body>
</html>

