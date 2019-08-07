<?php
include "Myconnection.php";
include "HtmlData.php";
$obj=new HtmlData();
 $connection=new Myconnection("localhost", "root", "", "nigella");
 $connection->setMysqliConnection();
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
    //echo "button clicked";
    $obj->getdata();
    $connection->insert_data();

}
?>


<?= $obj->printTable();?> 
</div>


<div name="my_display_operation">

</div>


</form>
</body>
</html>