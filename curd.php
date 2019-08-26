<?php
include "Myconnection.php";
include "HtmlData.php";
$obj=new HtmlData();
?>
<html lang="en">
<head>
  <title>CURD Example</title>
</head>
<body>

<form action="<?= $_SERVER['PHP_SELF']?>" method="POST">
<div name="my_insert_operation">
    <?= $obj->curd(); ?>
    <table class="table">
      <tr><td> <input type="submit" value="submit" name="submit"> </td><td></td></tr>
    </table>
</div>

<div>

<?php

if(isset($_POST["submit"]))
{
    //echo "button clicked"; //loooing chck kar na . data sahi a raha h ok sir  but ye itna complicated kyu h?hai to  kya kiya jai
    $obj->getdata();
    //$connection->insert_data();

}
?>

</div>


<div name="my_display_operation">
<table class="table" border=1>
    <thead>
      <tr>
        <th>name</th>
        <th>email</th>
        <th>course</th>
        <th>branch</th>
        <th>photo</th>
        <!-- <th>pass</th> -->
        <th>Action</th>
      </tr>
    </thead>
    <?=$obj->printTable();?>
  </table>
</div>
</form>
</body>
</html>