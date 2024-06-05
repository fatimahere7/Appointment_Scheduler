<?php
require_once("dbconn.php");
if(isset($_POST['submit']))
{
   if(empty($_POST['name'])|| empty($_POST['address']) ||empty($_POST['email']) ||empty($_POST['phone']) ||empty($_POST['birthdate'])||empty($_POST['appoint']))
   {
      echo 'Please Fill all the fields';
   }
   else
   {
      $UserName=$_POST['name'];
      $addr=$_POST['address'];
      $email=$_POST['email'];
      $phn=$_POST['phone'];
      $dob=$_POST['birthdate'];
      $appoint=$_POST['appoint'];
      $message="submitted successfully!";
      $query = "INSERT INTO appointments(name,email,address,dob,phone,appointment_date)
      VALUES('$UserName','$email','$addr','$dob','$phn','$appoint')";
      $result=mysqli_query($conn,$query);
      if ($result) {
        // echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
         echo "<script type='text/javascript'>alert('$message');window.location.href='index.php';</script>";
         //header("location:index.php");
     }
     else
     {
         echo "<script type='text/javascript'>alert('failed!')</script>";
     }
      // if($result)
      // {
      //   header("location:sucess.php");
      // }
      // else
      // {
      //   echo "Please check your Query";
      // }
   }
}

if(isset($_POST['click_view_btn']))   
{
    $id = $_POST['user_id'];
   //  echo $id;
    $query="select * from appointments WHERE id='$id'";
    $result=mysqli_query($conn,$query); 
    if(mysqli_num_rows($result)>0){
      while($row =mysqli_fetch_array($result)){
         echo'
         <h6>Name : '.$row['name'].'</h6> 
         <h6>Email : '.$row['email'].'</h6>
         <h6>Address : '.$row['address'].'</h6>
         <h6>Phone # :'.$row['phone'].'</h6>
         <h6> Date of Birth : '.$row['dob'].'</h6>
         <h6>Appointment Date : '.$row['appointment_date'].'</h6>

        ';
      }
    } 
    else{
      echo "<h4>No Result Found</h4>";
    }
}

?> 