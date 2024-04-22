<?php

class View extends Model {

    public function displayHeader() {
        include 'includes/header.inc.php';
    }
    public function displayFooter() {
        include 'includes/footer.inc.php';
    }
    public function displayNavbar() {
        include 'includes/navbar.inc.php';
    }
    public function displayNavUser() {
        include 'includes/navUser.inc.php';
    }
    public function showErrors($errors) {
        foreach ($errors as $error) {
            echo "<div class='alert alert-danger'>$error</div>";
        }
    }

    public function showSuccessMessage($message) {
        echo "<div class='alert alert-success'>$message</div>";
    }

    public function registrationForm() {
        echo '
        <div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card mt-5">
                    <div class="card-header bg-light">
                        <h4 class="text-center text-dark">Registration</h4>
                    </div>
                    <div class="card-body bg-light text-dark">
                        <form action="register.php" method="post">
                            <div class="form-group mb-3">
                                <label for="firstname">First name:</label>
                                <input type="text" name="firstname" id="firstname" placeholder="Firstname" class="form-control" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="lastname">Last name:</label>
                                <input type="text" name="lastname" id="lastname" placeholder="Lastname" class="form-control" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="email">Email Address:</label>
                                <input type="email" name="email" id="email" placeholder="Enter Email Address" class="form-control" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="password">Password:</label>
                                <input type="password" name="password" id="password" placeholder="Enter Password" class="form-control" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="confirmpassword">Confirm Password:</label>
                                <input type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password" class="form-control" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="gender">Gender:</label>
                                <select name="gender" id="gender" required>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="address">Address:</label>
                                <input type="text" name="address" id="address" placeholder="Enter Address" required>
                            </div>

                            <div class="form-group mb-3 text-center">
                                <button type="submit" name="submit" class="btn btn-primary mb-3">Register</button>
                                <br>
                                <a href="login.php" class="btn btn-primary">Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

        ';
    }

    public function loginForm() {
        echo '  
        <div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card mt-5">
                    <div class="card-header">
                        <h4 class="text-center">Login</h4>
                    </div>
                    <div class="card-body bg-light">
                        <form action="login.php" method="post">
                            <div class="form-group mb-3">
                                <label for="email">Email:</label>
                                <input type="email" id="email" name="email" placeholder="Enter Email Address"class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Password:</label>
                                <input type="password" id="password" name="password" placeholder="Enter Password" class="form-control" required>
                            </div>
                            <div class="form-group text-center mb-3">
                                <button type="submit" name="login" class="btn btn-primary">Login</button>
                                <a href="register.php" class="btn btn-primary">Register</a>
                            </div>
                        </form>
                        <div class="form-group text-center mb-3">
                            <small><a class="forgot-pass" href="password.php" target="_self">Forgot Password?</a></small>
                        </div>
                        <div class="form-group text-center mb-3">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#termsModal">Terms and Conditions</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="termsModal" tabindex="-1" role="dialog" aria-labelledby="termsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="termsModalLabel">Terms and Conditions</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Include terms and conditions content here -->
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. ...</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

        ';
    }

    public function indexView() {

        echo '
      
      <!--carousel-->
      
      <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="https://i.pinimg.com/originals/cf/23/50/cf23502f7da70cac3a1e373f44d28099.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption ">
              <h5>Services</h5>
              <p>Grooming</p>
              <p><a href="grooming.php" class="btn btn-warning mt-3">Learn More</a></p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="https://i.pinimg.com/564x/fc/64/2a/fc642a4869b097e9b2a8c549c879f693.jpg" class="d-block w-100" alt="">
            <div class="carousel-caption ">
              <h5>Services</h5>
              <p>Boarding</p>
              <p><a href="grooming.php" class="btn btn-warning mt-3">Learn More</a></p>
            </div>
          </div>    
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      
      <!-- about -->
      
      <section id="about" class="about section-padding">
        <div class="container">
          <div class="row">
            <div class="col-lg-4 col-md-12 col-12">
              <div class="about-img">
                <img src="data:image/jpeg;base64,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" alt="" class="img-fluid">
              </div>
            </div>
            <div class="col-lg-8 col-md-12 col-12 ps-lg-5 mt-md-5">
             <div class="about-text">
              <h2> We\'re dedicated to providing innovative solutions to streamline </h2> <br>
              <h2> What We Offer?</h2><p>
      Our online system offers a wide range of features and functionalities designed to meet your need</p>
              <a href="#" class="btn btn-warning">Learn More</a>
             </div>
            </div>
          </div>
        </div>
      </section>
      
      
      <!-- services -->
      
      <section id="services" class="services section-padding">
        <div class="container"> 
          <div class="row">
            <div class="col-md-12">
              <div class="section-header text-center pb-5">
                <h2>Pet Shop Services
      
      </h2>
                <p>Great acts are made up of small deeds.</p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-md-12 col-lg-4">
              <div class="card text-white text-center bg-dark pb-2">
                <div class="card-body">
                  <i class= "bi bi-slack"></i>
                  <h3 class="card-title">Grooming Appointments</h3>
                  <p class="lead">Schedule grooming sessions for pets, including baths, haircuts, nail trims, and ear cleaning.</p> 
                  <button class="btn btn btn-secondary text-light">Read More</button>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4">
              <div class="card text-white text-center bg-dark pb-2">
                <div class="card-body">
                  <i class="bi bi-subtract"></i>
                  <h3 class="card-title">Boarding Reservations</h3>
                  <p class="lead">Reserve accommodations for pets needing overnight boarding or daycare services.</p> 
                  <button class="btn btn-secondary text-light">Read More</button>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4">
              <div class="card text-white text-center bg-dark pb-2">
                <div class="card-body">
                  <i class="bi bi-subtract"></i>
                  <h3 class="card-title">Quality Service</h3>
                  <p class="lead">Our dedicated team is available around the clock to assist you with any questions and concerns.
      </p> 
                  <button class="btn btn-secondary text-light">Read More</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      
      <!-- contact -->
      
      
      <section id="contact" class="contact section-padding">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="section-header text-center pb-5">
                <h2>Contact Us</h2>
                <p></p>
              </div>
            </div>
          </div>
      
          
      <div class="col-md-12 text-center ">
              <a href="#" class="fa fa-facebook"></a>
              <a href="#" class="fa fa-twitter"></a>
              <a href="#" class="fa fa-google"></a>
              <a href="#" class="fa fa-linkedin"></a>
              <a href="#" class="fa fa-instagram"></a>
      </div>
                 </div>
              </form>
              </div>
            </div>
        </div>
      </section>
      
      <!-- footer -->
      
      <footer class="bg-dark p-2 text-center">
        <div class="container">
          <p class= "text-white">All Right Reserve Pet Shop</p>
        </div>
      </footer> ';
    }
    public function userView() {

      echo '
    
    <!--carousel-->
    
    <div id="carouselExampleCaptions" class="carousel slide">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="https://i.pinimg.com/originals/cf/23/50/cf23502f7da70cac3a1e373f44d28099.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption ">
            <h5>Services</h5>
            <p>Grooming</p>
            <p><a href="grooming.php" class="btn btn-warning mt-3">Learn More</a></p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="https://i.pinimg.com/564x/fc/64/2a/fc642a4869b097e9b2a8c549c879f693.jpg" class="d-block w-100" alt="">
          <div class="carousel-caption ">
            <h5>Services</h5>
            <p>Boarding</p>
            <p><a href="grooming.php" class="btn btn-warning mt-3">Learn More</a></p>
          </div>
        </div>    
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    
    <!-- about -->
    
    <section id="about" class="about section-padding">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-12 col-12">
            <div class="about-img">
              <img src="data:image/jpeg;base64,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" alt="" class="img-fluid">
            </div>
          </div>
          <div class="col-lg-8 col-md-12 col-12 ps-lg-5 mt-md-5">
           <div class="about-text">
            <h2> We\'re dedicated to providing innovative solutions to streamline </h2> <br>
            <h2> What We Offer?</h2><p>
    Our online system offers a wide range of features and functionalities designed to meet your need</p>
            <a href="#" class="btn btn-warning">Learn More</a>
           </div>
          </div>
        </div>
      </div>
    </section>
    
    
    <!-- services -->
    
    <section id="services" class="services section-padding">
      <div class="container"> 
        <div class="row">
          <div class="col-md-12">
            <div class="section-header text-center pb-5">
              <h2>Pet Shop Services
    
    </h2>
              <p>Great acts are made up of small deeds.</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 col-md-12 col-lg-4">
            <div class="card text-white text-center bg-dark pb-2">
              <div class="card-body">
                <i class= "bi bi-slack"></i>
                <h3 class="card-title">Grooming Appointments</h3>
                <p class="lead">Schedule grooming sessions for pets, including baths, haircuts, nail trims, and ear cleaning.</p> 
                <button class="btn btn btn-secondary text-light">Read More</button>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-12 col-lg-4">
            <div class="card text-white text-center bg-dark pb-2">
              <div class="card-body">
                <i class="bi bi-subtract"></i>
                <h3 class="card-title">Boarding Reservations</h3>
                <p class="lead">Reserve accommodations for pets needing overnight boarding or daycare services.</p> 
                <button class="btn btn-secondary text-light">Read More</button>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-12 col-lg-4">
            <div class="card text-white text-center bg-dark pb-2">
              <div class="card-body">
                <i class="bi bi-subtract"></i>
                <h3 class="card-title">Quality Service</h3>
                <p class="lead">Our dedicated team is available around the clock to assist you with any questions and concerns.
    </p> 
                <button class="btn btn-secondary text-light">Read More</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!-- contact -->
    
    
    <section id="contact" class="contact section-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-header text-center pb-5">
              <h2>Contact Us</h2>
              <p></p>
            </div>
          </div>
        </div>
    
        
    <div class="col-md-12 text-center ">
            <a href="#" class="fa fa-facebook"></a>
            <a href="#" class="fa fa-twitter"></a>
            <a href="#" class="fa fa-google"></a>
            <a href="#" class="fa fa-linkedin"></a>
            <a href="#" class="fa fa-instagram"></a>
    </div>
               </div>
            </form>
            </div>
          </div>
      </div>
    </section>
    
    <!-- footer -->
    
    <footer class="bg-dark p-2 text-center">
      <div class="container">
        <p class= "text-white">All Right Reserve Pet Shop</p>
      </div>
    </footer> ';
  }


}

?>
