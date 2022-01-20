<?php
include_once("connect_db.php");
if(isset($_POST['submit'])){
    $item_name=$_POST['item_name'];
    $cost=$_POST['cost'];
    $img=$_POST['item_image'];
    $quantity=$_POST['quantity'];

    $sql = "INSERT INTO shop (item_name,item_img,item_cost,item_status ,item_quantity)
    VALUES ('$item_name','$img','$cost','pending','$quantity')";
    if (mysqli_query($dbc, $sql)) {
       echo "<br>New record created successfully !";
} else {
    echo "Error: " . $sql . "
" . mysqli_error($dbc);
 }
 mysqli_close($dbc);
}


?>



<html>
    <head>
    
    <body>
        <div id="Div">
            <form action="newitem.php"  method="POST">
                Item name: <input type="text" name="item_name">
                item_image:<input type="text" name="item_image">
                Cost: <input type="text" name="cost">
                Quantity: <input type="text" name="quantity">
                <input value="Add item" type="submit" name="submit" ><br><br>
                </fieldset>
            
             
            </form>
        </div>
         <!--options for selecting different fonts -->
            
         <fieldset class="field">
                    <legend>Font:</legend> 
                 <select id="size" >
                     <option value="7pt">tiny</option>
                    <option  value="10pt">small</option>
                    <option selected="medium" value="12px">medium</option>
                    <option value="16pt">large</option>
                    <option value="24pt"> extra large</option>
                    <option value="32pt">XXL</option>
</select></fieldset>

        
        
    </body>
    <script type="text/javascript">
window.onload()= pageload;
             
             function pageload(){
                document.getElementById("Div").onchange = changesize;
             }

             
            function changesize() {
                let size = document.getElementById("Size").value;
	            document.getElementsByName("input").style.fontSize = size;
            }


    </script>
            
</html>


<?php 
echo '<p><a href="home.php">Home</a>|
<a href="shop.php">shop</a>|
<a href="cart.php">view cart</a>|
<a href="goodbye.php">Logout</a></p>';



include ('includes/footer.html');?>

