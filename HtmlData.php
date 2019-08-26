<?php
class HtmlData
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
public function __construct(){
  $connection=new Myconnection("localhost", "root", "", "nigella");
  //connection ko store karwana padta h kyo ki getmysqliconnection sirf obj return karta h or har funtion mai connectio ko istance ni kartai h is liyai construct mai kar liyai or usko var mai store karwa kai use kar liya
  $this->con = $connection->getMysqliConnection();
}
//   public function getjumbotron()
//     {
// $this->card=<<<HTML
//              <div class="jumbotron">
//     <h1>Bootstrap Tutorial</h1>
//     <p>Bootstrap is the most popular HTML, CSS, and JS framework for developing responsive, mobile-first projects on the web.</p>
//   </div>
// HTML;
//         return $this->card;
//     }

    public function printTable()
    {
      $sql="select * from student";
      $res=mysqli_query($this->con,$sql);
//$c=1;
//btone more ques why only one record is fetching jabki meri table m to kafi records h??????
      while($row=mysqli_fetch_array($res))
      {
        $this->stuId=$row["Stu_id"];
        $this->name=$row["name"];
        $this->email=$row["email"];
        $this->course=$row["course"];
        $this->branch=$row["branch"];
        $this->img=$row["photo"];
        //$this->pass=$row["password"];
        $this->ipath="./Images/".$this->img;
//$c++;
$this->table.=<<<HTML

      <tr>
        <td>{$this->stuId}</td>
        <td>{$this->email}</td>
        <td>{$this->course}</td>
        <td>{$this->branch}</td>
        <td>
        <img height=100 width=100 src={$this->ipath}>
        </td>
        <!-- <td>{$this->pass}</td> -->
        <td> <a href="">Edit</a> <a href="">Delete</a> </td>
      </tr>
HTML;
    }
    return $this->table;
    }//form kyo le a raha h include kiya h kya 
    
    public function getdata()
    {
          //$this->Fname=filter_input(INPUT_POST, 'name',FILTER_SANITIZE_STRING);

          $this->name=filter_input(INPUT_POST, 'name',FILTER_SANITIZE_STRING);
          $this->email=filter_input(INPUT_POST, 'email',FILTER_SANITIZE_STRING);
          $this->course=filter_input(INPUT_POST, 'course',FILTER_SANITIZE_STRING);
          $this->branch=filter_input(INPUT_POST, 'branch',FILTER_SANITIZE_STRING);
          //$this->img=filter_input(INPUT_POST, 'photo',FILTER_SANITIZE_STRING);
          $this->pass=filter_input(INPUT_POST, 'pass',FILTER_SANITIZE_STRING);

          $this->img=$_FILES['photo'];
          $this->img_name='Stu_'.$image['name'];
          $this->img_size=$image['size'];
          $this->img_type=$image['type'];
          move_uploaded_file($image['tmp_name'],"Images/".$img_name);
          $this->insert_data($this->name, $this->email, $this->course, $this->branch, $this->img, $this->pass);
    }

    public function curd()
    {
$this->form=<<<HTML
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
return $this->form;
    }

    private function insert_data($name, $email, $course, $branch, $photo, $password)
    {
        
        $sql="insert into student (name, email, course, branch, photo, password) values ('$name', '$email', '$course', '$branch', '$photo', '$password')";

        $result=mysqli_query( $this->con,$sql);
        if($result)
        {
          return $this->printTable();
        }
    }
       
    // public function update_data()
    // {
        
    // }
    // public function delete_data()
    // {
    //   //$sql="delete from student where " . 
    // }
//     public function show()
//     {
// $this->table=<<<HTML
// <h2>Student Registration</h2>
//       <table class="table">
//       <tr><td> Enter your name </td><td><input type="text" name="name"></td></tr>
//       <tr><td> Enter your email </td><td><input type="text" name="mail"></td></tr>
//       <tr><td> Enter your course </td><td><input type="text" name="course"></td></tr>
//       <tr><td> Enter your branch </td><td><input type="text" name="branch"></td></tr>
//       <tr><td> Select your photo </td><td><input type="file" name="photo"></td></tr>
//       <tr><td> Enter your password </td><td><input type="text" name="pass"></td></tr>
//     </table>
// HTML;
// //return $this->table;
//     }



}
?>