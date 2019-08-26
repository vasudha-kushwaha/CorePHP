<?php
include "Actions.php";
$obj= new Actions();
//$obj->getdata();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CURD 1</title>
</head>
<body>
<?php
        if(isset($_GET["Update"]))
        {
            $select_row=$obj->Select();
            foreach($select_row as $row)
            {
?>
<form action="<?= $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
- <h3>Update a student</h3>
    <table border=1>
    <tr><td></td><td><input type="hidden" name="stu_id"  value="<?php echo $row["Stu_id"];  ?>"></td></tr>
    <tr><td>Enter Name</td><td><input type="text" name="stu_n" value="<?php echo $row["name"];  ?>"></td></tr>
    <tr><td>Enter Email</td><td><input type="text" name="stu_m" value="<?php echo $row["email"]; ?>"></td></tr>
    <tr><td>Enter Course</td><td><input type="text" name="stu_c" value="<?php echo $row["course"]; ?>"></td></tr>
    <tr><td>Enter Branch</td><td><input type="text" name="stu_b" value="<?php echo $row["branch"]; ?>"></td></tr>
    <tr><td>Upload your photo</td><td><input type="file" name="img"> <img src="./Images/<?php echo $row["photo"]; ?>" height=100 width=100></td></tr>
    </table>
    <input type="submit" value="Update Student" name="Update_Student">
    </form> 
<?php 
            }
        }
        else
        {
?>
<h2>Student Registration</h2>
<form action="<?= $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
      <table class="table">
      <tr><td> Enter your name </td><td><input type="text" name="name"></td></tr>
      <tr><td> Enter your email </td><td><input type="text" name="email"></td></tr>
      <tr><td> Enter your course </td><td><input type="text" name="course"></td></tr>
      <tr><td> Enter your branch </td><td><input type="text" name="branch"></td></tr>
      <tr><td> Select your photo </td><td><input type="file" name="photo"></td></tr>
      <tr><td> Enter your password </td><td><input type="text" name="pass"></td></tr>
    </table>  
    <input type="submit" value="Add new Student" name="add_stu"></form>
<?php
        }
    if(isset($_POST["add_stu"]))
    {
      
        $obj->getdata();
    }
    if(isset($_POST["Update_Student"]))
    {
        //$obj->Update_details();
        $obj->getdata1();
    }
?>


    <hr>
    <h2>Student Details</h2>
    <table border=1>
    <tr>
    <td>Name</td>
    <td>Email</td>
    <td> Course</td>
    <td> Branch</td>
    <td> photo</td>
    <td>Edit</td>
    <td>Delete</td>
    </tr>
<?php
        $myRow=$obj->Show_Details();
        foreach($myRow as $row)
        {
?>
    <tr>
    <td>  <?php echo $row["name"];  ?>  </td>
    <td>  <?php echo $row["email"];  ?>  </td>
    <td>  <?php echo $row["course"];  ?>  </td>
    <td>  <?php echo $row["branch"];  ?>  </td>
    <td> <img src="./Images/<?php echo $row["photo"]; ?>" height=100 width=100>  </td>
    <td><a href="curd1.php?Update=1&Stu_id=<?php echo $row["Stu_id"]; ?>">Edit</a></td>
    <td><a href="action.php?Delete=1&Stu_id=<?php echo $row["Stu_id"]; ?>">Delete</a></td>
    </tr>
<?php
        }
?>
</table>
</body>
</html>