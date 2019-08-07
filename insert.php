<?php
include "Myconnection.php";

class insert extends Myconnection
{
    $connection=new Myconnection("localhost", "root", "", "nigella");
    $connection->setMysqliConnection();
    
}
?>