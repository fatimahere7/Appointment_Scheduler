
<?php      
    session_start();
    require_once("../dbconn.php"); 
    $username = $_POST['user'];  
    $password = $_POST['pass'];  
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($conn, $username);  
        $password = mysqli_real_escape_string($conn, $password);  
      
        $sql = "select *from login where username = '$username' and password = '$password'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
        $message="Login failed. Invalid username or password."; 
        if($count == 1){ 
             $_SESSION['user-name']=$username;
            // header("location:../admin/adminPage.php"); 
            header("location:../admin/index-admin.php"); 
        }  
        else{  
           // echo "<script type='text/javascript'>alert(' Login failed. Invalid username or password.')</script>";
            // echo "<h1> Login failed. Invalid username or password.</h1>"; 
            echo "<script type='text/javascript'>alert('$message');window.location.href='login-index.php';</script>";

           
           // header("location:login-index.php");
        } 

?>  