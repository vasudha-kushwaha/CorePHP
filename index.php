<?php
include "Myconnection.php";
include "HtmlData.php";
$obj=new HtmlData();
if(isset($_POST["submit"]))
{
    //echo "button clicked";
    $obj->getdata();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
 <?php
 //echo $obj->getjumbotron();

 ?>
  <p>This is some text.</p>      
  <p>This is another text.</p>    

</div>
<form action="<?= $_SERVER['PHP_SELF']?>" method="POST">
<input type="text" name="name" required placeholder="enter your name">
<input type="submit" value="submit" name="submit">




</form>

</body>
</html>
