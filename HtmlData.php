<?php
include "Myconnection.php";
class HtmlData extends Myconnection
{
  private $stuId="";
  private $name="";
  private $email="";
  private $course="";
  private $branch="";
  private $img="";
  private $pass="";

  public function getjumbotron()
    {
$this->card=<<<HTML
             <div class="jumbotron">
    <h1>Bootstrap Tutorial</h1>
    <p>Bootstrap is the most popular HTML, CSS, and JS framework for developing responsive, mobile-first projects on the web.</p>
  </div>
HTML;
        return $this->card;
    }
    public function printTable()
    {
      $connection=new Myconnection("localhost", "root", "", "nigella");
      $connection->setMysqliConnection();
      $sql="select * from student";
      $res=mysqli_query($sql, $connection);
      $row=mysqli_fetch_array($res);
      while($row)
      {
        $this->stuId==$row["Stu_id"];
        $this->name=$row["name"];
        $this->email=$row["email"];
        $this->course=$row["course"];
        $this->branch=$row["branch"];
        $this->img=$row["photo"];
        $this->pass=$row["password"];

$this->table=<<<HTML
        <table class="table">
    <thead>
      <tr>
        <th>name</th>
        <th>email</th>
        <th>course</th>
        <th>branch</th>
        <th>photo</th>
        <th>pass</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>{$this->name}</td>
        <td>{$this->email}</td>
        <td>{$this->course}</td>
        <td>{$this->branch}</td>
        <td>{$this->img}</td>
        <td>{$this->pass}</td>
        <td> <a href="">Edit</a> <a href="">Delete</a> </td>
      </tr>
    </tbody>
    </table>
HTML;
return $this->table;
    }
    public function getdata()
    {
          //$this->Fname=filter_input(INPUT_POST, 'name',FILTER_SANITIZE_STRING);

          $this->name=filter_input(INPUT_POST, 'name',FILTER_SANITIZE_STRING);
          $this->email=filter_input(INPUT_POST, 'email',FILTER_SANITIZE_STRING);
          $this->course=filter_input(INPUT_POST, 'course',FILTER_SANITIZE_STRING);
          $this->branch=filter_input(INPUT_POST, 'branch',FILTER_SANITIZE_STRING);
          $this->img=filter_input(INPUT_POST, 'photo',FILTER_SANITIZE_STRING);
          $this->pass=filter_input(INPUT_POST, 'pass',FILTER_SANITIZE_STRING);
    }
    public function curd()
    {
$this->table=<<<HTML
<h2>Student Registration</h2>
      <table class="table">
      <tr><td> Enter your name </td><td><input type="text" name="name"></td></tr>
      <tr><td> Enter your email </td><td><input type="text" name="email"></td></tr>
      <tr><td> Enter your course </td><td><input type="text" name="course"></td></tr>
      <tr><td> Enter your branch </td><td><input type="text" name="branch"></td></tr>
      <tr><td> Select your photo </td><td><input type="file" name="photo"></td></tr>
      <tr><td> Enter your password </td><td><input type="text" name="pass"></td></tr>
    </table>
HTML;
return $this->table;
    }

    public function insert_data()
    {
        $connection=new Myconnection("localhost", "root", "", "nigella");
        $connection->setMysqliConnection();
        $sql="insert into student (name, email, course, branch, photo, password) values ($this->name, $this->email, $this->course, $this->branch, $this->img, $this->pass)";
        $result=mysqli_query($sql, $connection);
        if($result)
        {
            show();
        }else
        {
          echo'<script>alert("Unable to Connect check your Mysqli database credentials")</script>';
        }
    }
    
    public function update_data()
    {
        
    }
    public function delete_data()
    {
      $connection=new Myconnection("localhost", "root", "", "nigella");
      $connection->setMysqliConnection();
      //$sql="delete from student where " . 
    }
    public function show()
    {
$this->table=<<<HTML
<h2>Student Registration</h2>
      <table class="table">
      <tr><td> Enter your name </td><td><input type="text" name="name"></td></tr>
      <tr><td> Enter your email </td><td><input type="text" name="mail"></td></tr>
      <tr><td> Enter your course </td><td><input type="text" name="course"></td></tr>
      <tr><td> Enter your branch </td><td><input type="text" name="branch"></td></tr>
      <tr><td> Select your photo </td><td><input type="file" name="photo"></td></tr>
      <tr><td> Enter your password </td><td><input type="text" name="pass"></td></tr>
    </table>
HTML;
return $this->table;
    }



}
?>