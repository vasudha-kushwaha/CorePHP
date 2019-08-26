<?php
include "Myconnection.php";
class Actions
{
    private $stuId="";
    private $name="";
    private $email="";
    private $course="";
    private $branch="";
    private $img="";
    private $pass="";
    private $con;
    private $ipath="";
    private $img_name="";
    private $img_size;
    private $img_type;
    public function __construct()
    {
        $connection=new Myconnection("localhost", "root", "", "nigella");
        $this->con = $connection->getMysqliConnection();
    }
    public function Select()
    {
        $id=$_GET["Stu_id"] ?? null;
        $sql="select * from student where Stu_id=" . $id ;
        $array=array();
        $res=mysqli_query($this->con , $sql);
        while($row=mysqli_fetch_assoc($res))
        {
            $array[]=$row;
        }
        return $array;
    }
    public function Show_Details()
    {
        $sql="select * from student";
        $array=array();
        $res=mysqli_query($this->con , $sql);
        while($row=mysqli_fetch_assoc($res))
        {
            $array[]=$row;
        }
        return $array;
    }
    private function Insert_Details($name, $email, $course, $branch, $img_name, $password)
    {
        $sql="insert into student (name, email, course, branch, photo, password) values ('$name', '$email', '$course', '$branch', '$img_name', '$password')";
        //echo $sql;
        $result=mysqli_query( $this->con,$sql);
        if($result)
        {
            //alert("Record inserted");
            //Show_Details();
            //echo 'Record inserted';
        }
    } 
    public function getdata()
    {
        // print_r($_POST);
        // die;
          //$this->Fname=filter_input(INPUT_POST, 'name',FILTER_SANITIZE_STRING);
          $this->name=filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
          $this->email=filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
          $this->course=filter_input(INPUT_POST, 'course', FILTER_SANITIZE_STRING);
          $this->branch=filter_input(INPUT_POST, 'branch', FILTER_SANITIZE_STRING);
          //$this->img=filter_input(INPUT_POST, 'photo', FILTER_SANITIZE_STRING);
          $this->pass=filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING);
          $this->img=$_FILES['photo'];
          $this->img_name='Stu_'.$this->img['name'];
          $this->img_size=$this->img['size'];
          $this->img_type=$this->img['type'];
          //echo  $this->img_name;exit;
          move_uploaded_file($this->img['tmp_name'],"Images/".$this->img_name);
        //   echo $this->name;
        //   echo $this->email;
        //   echo $this->course;
        //   echo $this->branch;
        //   echo $this->pass;
          $this->Insert_Details($this->name, $this->email, $this->course, $this->branch, $this->img_name, $this->pass);
    }
    public function getdata1()
    {
        // print_r($_POST);
        // die;
          //$this->Fname=filter_input(INPUT_POST, 'name',FILTER_SANITIZE_STRING);
          $this->name=filter_input(INPUT_POST, 'stu_n', FILTER_SANITIZE_STRING);
          $this->email=filter_input(INPUT_POST, 'stu_m', FILTER_SANITIZE_STRING);
          $this->course=filter_input(INPUT_POST, 'stu_c', FILTER_SANITIZE_STRING);
          $this->branch=filter_input(INPUT_POST, 'stu_b', FILTER_SANITIZE_STRING);
          //$this->img=filter_input(INPUT_POST, 'photo', FILTER_SANITIZE_STRING);
          $this->img=$_FILES['img'];
          $this->img_name='Stu_'.$this->img['name'];
          $this->img_size=$this->img['size'];
          $this->img_type=$this->img['type'];
          //echo  $this->img_name;exit;
          move_uploaded_file($this->img['tmp_name'],"Images/".$this->img_name);
          echo $this->name;
          echo $this->email;
          echo $this->course;
          echo $this->branch;
          echo $this->pass;
          $this->Update_Details($this->name, $this->email, $this->course, $this->branch, $this->img_name);
    }
    public function Update_details($name, $email, $course, $branch, $img_name)
    {

        $id=$this->stuId=$_GET["Stu_id"];
        echo $this->stuId;
        $sql="update student set name='$name' , email='$email', course='$course', branch='$branch', photo='$img_name' where Stu_id='$id' ";
        echo $sql;
        $result=mysqli_query( $this->con,$sql);
        if($result)
        {
          return Show_Details();
        }
    }
}
?>