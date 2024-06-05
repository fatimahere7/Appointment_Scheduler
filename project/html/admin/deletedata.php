<?php
 require_once("../dbconn.php");
 if(isset($_GET['Del']))
 {
    $UserID=$_GET['Del'];
    $query="DELETE FROM appointments WHERE id='".$UserID."'";
    $result=mysqli_query($conn,$query);
    if($result)
    {
        header("location:list.php");
    }
    else
    {
        echo "Please Check your Query";
    }
 }
else
{
    header("location:list.php");
}
?>