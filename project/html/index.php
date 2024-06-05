
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Appointment Scheduling</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="styleMain.css">
</head>
<body>

    <!-- Header -->
    <header class="header">
        <div class="container">
            <!-- Logo -->
            <div class="logo"> <img src="../image/logo-img.png" alt=""> </div>
            <!-- /Logo -->

            <!-- Header right -->
            <div class="header-right">
                <!-- Main navigation -->
                <nav id="main-navigation">
                    <ul>
                        <li><a href="./">Home</a></li>
                        <li><a href="#doctors/">Doctors</a></li>
                        <li><a href="#services">Services</a></li>
                        <li><a href="#Address">Address</a></li>
                    </ul>
                </nav>
                <!-- /Main navigation -->
            </div>
            <!-- /Header right -->
        </div>
    </header>
    <!-- /Header -->

    <div class="banner">
        <div class="container">
                <div class="text-bg">
                    <div class="banner-content">
                
                        <div class="col-3 banner">
                            <h3>Consult Our Best Doctors</h3>
                            <p>Our doctors are highly skilled and trained in various medical specialties.
                                From primary care to specialized treatments, our team is equipped to handle a wide range
                                of health concerns.</p>
                            <!-- Button to open the popup -->
                            <button class="open-form-button" onclick="toggleForm()">Booking Form</button>
                            <div id="appointment-form-container" style="display: none;">
                            <form action="insertdata.php" method="post"  id="appointment-form">
                                    <!-- Existing form fields -->
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
                        </div>
                        <div class="img-post"> <img src="../image/banner-img.png" alt=""> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
        <section id="section-blog">
            <h2 class="text-center">Our Best Doctors</h2>
            <div class="container" >
                <div class="col-4 blog-post">
                    <div  class="img-post2"> <img src="../image/doctor-1.jpg" alt=""> </div>
                    <h3>Dr Jonathan</h3>
                    <p>A cardiologist is a medical doctor who specializes in the diagnosis and treatment of heart-related conditions.
                        They are experts in assessing and managing diseases such as heart.</p>
                    <p>Read More &gt;&gt;</p>
                </div>
                <!--/blog post -->

                <div class="col-4 blog-post">
                    <div class="img-post2"> <img src="../image/doctor-2.jpg" alt=""> </div>
                    <h3>Dr Behran</h3>
                    <p>Neurologists are doctors who focus on the diagnosis and treatment of disorders affecting the nervous system,
                        including the brain, spinal cord, and nerves.</p>
                    <p>Read More &gt;&gt;</p>
                </div>
                <!--/blog post -->

                <div class="col-4 blog-post">
                    <div class="img-post2"> <img src="../image/doctor-3.jpg" alt=""> </div>
                    <h3>Dr Julian</h3>
                    <p>Pediatricians are doctors who specialize in the care of infants, children, and adolescents.
                        They are trained to address a wide range of childhood illnesses.</p>
                    <p>Read More &gt;&gt;</p>
                </div>
                <!--/blog post -->
            </div>
        </section>
        <!--/Blog -->
    </div>
    <!-- Modal -->
         
   
    <script>

        function toggleForm() {
            var formContainer = document.getElementById('appointment-form-container');
            formContainer.style.display = (formContainer.style.display === 'none' || formContainer.style.display === '') ? 'block' : 'none';
        }

        function cancelForm() {
            var formContainer = document.getElementById('appointment-form-container');
            formContainer.style.display = 'none';
        }
    </script>

<!--footer start-->
<footer class="footer">
  <div class="container">
      <div class="footer-content">
          <div class="footer-left">
              <!-- "Go to Top" button -->
              <button onclick="goToTop()" class="go-to-top-button">Go to Top</button>
          </div>
          <div class="footer-right">
              <!-- Logo image -->
              <div class="logo-footer"> <img src="../image/logo-img.png" alt="Logo"> </div>
              
          </div>
          <div class="footer-bottom">
            <p>3556 Beech Street, USA</p>
            <p>© 2024 Doccure. All Rights Reserved.</p>
            <p><a href="#">Privacy Policy</a></p>
        </div>
      </div>
      
  </div>

</footer>
<!-- /Footer -->

<script>
  function goToTop() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
  }
</script>
</body>
</html>