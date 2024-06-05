<html>  
<head>  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
    <title>PHP login system</title>  
    <!-- insert style.css file inside index.html   -->
    <link rel = "stylesheet" type = "text/css" href = "login-style.css">   
</head>  
<body>  
<div class="login-page">
      <div class="form">
        <div class="login">
          <div class="login-header">
            <h3>LOGIN</h3>
            <hr>
            <p>Please enter your credentials to login.</p>
          </div>
        </div>
        <form name="f1" action = "authentication.php" onsubmit = "return validation()"  class="login-form" method = "POST" autocomplete="off">
          <input type="text" id ="user" name  = "user"  placeholder="User Name"/>
          <input type="password" id ="pass" name  = "pass" placeholder="Password"/>
          <input type =  "submit" id = "btn" value = "Login" > 
          
        </form>
      </div>
    </div>
    <!-- <div id = "frm">
       <div class="container">
          <center><h1>Login</h1></center>
       </div>
          <hr>
        <form name="f1" action = "authentication.php" onsubmit = "return validation()" method = "POST" autocomplete="off">  
            <div class="container"> 
                <label> UserName: </label>  
                <input type = "text" id ="user" name  = "user" >  
            </div>  
            <div class="container">  
                <label> Password: </label>  
                <input type = "password" id ="pass" name  = "pass" >  
            </div>  
            <div class="container">    
                <input type =  "submit" id = "btn" value = "Login" >  
            </div>  
        </form>  
    </div>   -->
    <!-- // validation for empty field    -->
    <script>  
            function validation()  
            {  
                var id=document.f1.user.value;  
                var ps=document.f1.pass.value;  
                if(id.length=="" && ps.length=="") {  
                    alert("User Name and Password fields are empty");  
                    return false;  
                }  
                else  
                {  
                    if(id.length=="") {  
                        alert("User Name is empty");  
                        return false;  
                    }   
                    if (ps.length=="") {  
                    alert("Password field is empty");  
                    return false;  
                    }  
                }                             
            }  
        </script>  
</body>     
</html>  
