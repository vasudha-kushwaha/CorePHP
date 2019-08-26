<?php
class Myconnection 
{
    
    private $dbserver;
    private $dbuser;
    private $dbpassword;
    private $dbname;

    private $con, $connect, $close;
    private $ver;

    public function __construct($dbserver, $dbuser, $dbpassword, $dbname)
    {
        $this->dbserver = filter_var($dbserver, FILTER_SANITIZE_STRING);
        $this->dbuser = filter_var($dbuser, FILTER_SANITIZE_STRING);
        $this->dbpassword= filter_var($dbpassword, FILTER_SANITIZE_STRING);
        $this->dbname= filter_var($dbname, FILTER_SANITIZE_STRING);
    }
    public function getMysqliConnection() //not set because this function return u a connection
    {
      $this->con = mysqli_connect($this->dbserver, $this->dbuser, $this->dbpassword, $this->dbname);
      if ($this->con) 
      {
         //echo "connected";
          return $this->con;
      } 
      else
      {
          echo'<script>alert("Unable to Connect check your Mysqli database credentials")</script>';
          exit();
      }
    }
    
    
}

//$ob=new Myconnection("localhost", "root", "", "nigella");


?>