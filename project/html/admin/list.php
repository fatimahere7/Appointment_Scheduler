<?php
    require_once("../dbconn.php");
    $query="select * from appointments";
    $result=mysqli_query($conn,$query);
    session_start();

    $userprofile =$_SESSION['user-name'];
    if($userprofile==true)
    {
        
    }
    else{
      header('location: ../login/login-index.php');
    }
?> 

 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
     
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>

     <!-- <link rel="stylesheet" href="../styleMain.css"> -->
     <title>View records</title>
     <style>
        #button-form-container {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: #fff;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    z-index: 999;
    border-radius: 5px;
    width: 80%;
    max-width: 400px;
}

#appointment-form-container {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: #fff;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    z-index: 999;
    border-radius: 5px;
    width: 80%;
    max-width: 400px;
}

#appointment-form label {
    display: block;
    margin-bottom: 8px;
    color: #333;
    font-weight: bold;
}

#appointment-form input {
    width: 100%;
    padding: 8px;
    margin-bottom: 15px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
}

#appointment-form button {
   background-color: #0d6efd;
    color: #fff;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
}

#appointment-form button:hover {
    background-color: #0a58ca;
}

#appointment-form {
    max-width: 400px;
    margin: 0 auto;
}

#appointment-form button.book-appointment-button {
    background-color: #0d6efd;
    color: #fff;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
}

#appointment-form button.book-appointment-button:hover {
    background-color: #0a58ca;
}
     </style>
 </head>
 <body class="bg-dark">
 <?php $userprofile =$_SESSION['user-name'];
    if($userprofile==true)
    {
        
    }
    else{
      header('location: ../login/login-index.php');
    }
   ?> 
     <div class="container">
        
         <div class="row">
             <div class="col m-auto">
                <div class="card mt-5">
                <h2>List of Appointments</h2>
                <button class="w3-button w3-right w3-blue open-form-button" onclick="toggleForm()">+ Create New</button>
                <div id="appointment-form-container" style="display: none;">
                  <form action="../insertdata.php" method="post"  id="appointment-form">
                                   
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required="">
  
                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" required="">

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required="">

                    <label for="phone">Phone Number:</label>
                    <input type="tel" id="phone" name="phone" required="">

                                 
                    <label for="birthdate">Date of Birth:</label>
                    <input type="date" id="birthdate" name="birthdate" required="">

                     <label for="currentDateTime">Appointment Date:</label>
                     <input type="datetime-local" id="currentDateTime" name="appoint" required="">

                     <button type="submit" class="book-appointment-button" name="submit" >Book Appointment</button>
                     <button type="button" class="cancel-appointment-button" onclick="cancelForm()">Cancel</button>
                  </form>
                  
                </div>
                    <table class="table table-bordered">
                        <!-- <tr>
                            <td> <h2>List of appointments</h2></td>
                            <td><button> Create</button></td>
                        </tr> -->
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Appointment</th>
                            
                        </tr>
                        <?php
                           
                               while($row=mysqli_fetch_assoc($result))
                               {
                                    $UserID=$row['id'];
                                    $UserName=$row['name'];
                                    $phn=$row['phone'];
                                    $address=$row['address'];
                                    $email=$row['email'];
                                    $dat=$row['dob'];
                                    $appoint=$row['appointment_date'];
                        ?>  
                                <tr>
                                    <td class="user_id"><?php echo $UserID ?></td>
                                    <td><?php echo $UserName ?></td>
                                    <td><?php echo $phn ?></td>
                                    <td><?php echo $appoint ?></td>
                                
                                    <td><a href="#" class="btn btn-info btn-sm view_data" onclick="viewtoggleForm()" >View</a></td>
                                    
                                    <td><a style="color:red" href="deletedata.php?Del=<?php echo $UserID?>">Delete</a></td>
                                </tr>    
                        <?php
                                }
                         ?>
                    </table>
                    <div class="modal fade" id="viewusermodal" tabindex="-1" role="dialog" aria-labelledby="viewusermodalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h3 class="modal-title" id="viewusermodalLabel">Patient Meta</h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            <div class="view_user_data">
                                    
                                            </div>
                                          </div>
                                          <div class="modal-footer">
                                           
                                           
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                </div>
            </div>
         </div> 
     </div> 

     
<script>
        function toggleForm() {
            var formContainer = document.getElementById('appointment-form-container');
            formContainer.style.display = (formContainer.style.display === 'none' || formContainer.style.display === '') ? 'block' : 'none';
        }
        function viewtoggleForm() {
            var formContainer = document.getElementById('button-form-container');
            formContainer.style.display = (formContainer.style.display === 'none' || formContainer.style.display === '') ? 'block' : 'none';
        }
        function cancelForm() {
            var formContainer = document.getElementById('appointment-form-container');
            formContainer.style.display = 'none';
        }
     </script>  
   
     <script>
        $(document).ready(function(){
           
            $('.view_data').click(function(e){
                e.preventDefault();
                // console.log("hello");
                var user_id = $(this).closest('tr').find('.user_id').text();
                // console.log(user_id);
                $.ajax({
                    method : "POST",
                    url:"../insertdata.php",
                    data:{
                        'click_view_btn':true,
                        'user_id':user_id,
                    },
                    success : function(response){
                        console.log(response);
                        $(".view_user_data").html(response);
                        $('#viewusermodal').modal('show');
                    }
                });
            });
        });

     </script>
       <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
 </body>
 </html>


