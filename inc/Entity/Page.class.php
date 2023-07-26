<?php

// MAKE SURE TO MAKE A BACKUP COPY OF THIS FILE BEFORE WORKING ON THE AUTHENTICATION REQUIREMENT

class Page  {

    public static $heading = "Veterinary ";
    public static $studentID = "";
    public static $studentName ="Luiz and Oliver";
    public static $member;

    static function displayHeader2(){
      ?>
 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pharma-Vet</title>
  <!-- Add Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="css/mainPageStyles.css" rel="stylesheet">

</head>
<body>
      <?php
    }

    static function displayHeader() {
        ?>
       <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pharma-Vet</title>
  <!-- Add Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="css/mainPageStyles.css" rel="stylesheet">

</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-md">
    <a class="navbar-brand" href="#">
      <img src="./images/veterinary-medicine.svg" width="30" height="30" class="d-inline-block align-top" alt="">
      Pharma-Vet</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="#">Place Order</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">How it Works</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About Us</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-info" href="logInForm.html">Log In</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-outline-info" href="#">Register</a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Header / Jumbotron -->
  <div class="hero-image">
  <div class="jumbotron text-center">
    <h1 class="display-4">Welcome to Pharma-Vet!</h1>
    <p class="lead">Order your pets medicine and receive it at your house in 3 simple steps:</p>
    <p>1. Log In</p>
    <p>2. Place your order</p>
    <p>3. Receive your order</p>
    <br>
    <p>
      <a href="ProjectMainBackup.php" class="btn btn-info btn-lg">Login</a>
      <a href="#" class="btn btn-outline-info btn-lg">Register</a>
    </p>
  </div>
  </div>

        <?php
        
     }

    static function displayFooter()    {
        ?>
       <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

        <?php  
        }

        static function addPetForm()    {
            ?>
       <!-- Form to add pets to the user profile -->
<!-- (Pets will be added to the PET table in the database) -->

<!-- Start the page 'header' -->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pharma-Vet</title>
        <!-- Add Bootstrap CSS -->   
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">  
        <link href="css/petFormStyles.css" rel="stylesheet">
    </head>
    <body>

          <!-- Navbar -->
  <nav class="navbar navbar-expand-md">
    <a class="navbar-brand" href="#">
      <img src="./images/veterinary-medicine.svg" width="30" height="30" class="d-inline-block align-top" alt="">
      Pharma-Vet</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="#">Place Order</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">How it Works</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About Us</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-info" href="#">Log In</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-outline-info" href="#">Register</a>
        </li>
      </ul>
    </div>
  </nav>
                        
            <section class="main">
                <!-- Start the page's form -->
                <div class="form">
                    <form  class="addPetForm" action="" method="post">
                        <fieldset id="fieldsetForm">
                            <legend class="formTitle">Add your pets</legend>
                            <form>
                                <div class="form-group">
                                    <form>
                                        <div class="form-group">
                                          <label for="petName">Pet's Name</label>
                                          <input type="text" class="form-control" name="petName" id="petName" placeholder="Nice Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="petType">Pet's Type</label>
                                            <select class="form-control" name="petType" id="petType">
                                              <option>Dog</option>
                                              <option>Cat</option>
                                              <option>Piglet</option>
                                              <option>Horse</option>
                                              <option>Bird</option>
                                              <option>Fish</option>
                                              <option>Rabbit</option>
                                              <option>Rodent</option>
                                              <option>Sheep</option>
                                              <option>Goat</option>
                                              <option>Cow</option>
                                              <option>Chicken</option>
                                              <option>Turkey</option>
                                              <option>Other</option>
                                            </select>
                                          </div>
                                          <div class="form-group">
                                            <label for="petImage">Pet's image</label>
                                            <input type="file" class="form-control-file" name="petImage" id="petImage">
                                          </div>
                                      </form>
                                      <input type="hidden" name="action" value="addPet">
                                      <button type="submit" class="btn btn-info" value="addMascot">Submit</button>
                              </form>
                            
                        </fieldset>
                    </form>
                </div>
            </section> 
            
            <section class="sidebar">
                <!-- Start the page's error notification -->
                <div class="highlight">
                    <p>Please fix the following errors:</p>
                    <ul>
                        <li>Error 1</li>
                        <li>Error 2</li>
                    </ul>                                        
                </div>
                
                <!-- Start the page's thank you notification -->
                <div class="highlight">
                    <h2>
                        Your pet's info has been saved.<br>
                        
                    </h2>
                                                           
                </div>
                
                <!-- Start the page's display submitted data -->
                <div class="data">
                    <b>Entered data is:</b>
                    <table>
                        
                        <tr>
                            <th>Pet's Name</th>
                            <td>Name entry</td>
                        </tr>
                        <tr>
                            <th>Pet's Type</th>
                            <td>Type entry</td>
                        </tr>
                        <tr>
                            <th>Pet's Picture</th>
                            <td>Picture</td>
                        </tr>
                    </table>
                </div>
            </section>
            
        <!-- Start the page's footer -->            
          <!--Footer: Add Bootstrap JS and jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>

</html>
    
            <?php  
            }
    

        

    static function displayTable(/*Array $laptops*/) {?>

    <!-- main section: table -->
    <div class="p-5">
        <input type="text" class="searchInput" placeholder="Search active drugs">
        <input type="text" class="searchInput" placeholder="Search Category">

        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th scope="col">Active Drug</th>
                <th scope="col">Category</th>
                <th scope="col">Concentration</th>
                <th scope="col">Presentation</th>
                <th scope="col">Size</th>
                <th scope="col">Flavor</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th scope="col">Add to order</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">Medetomidine</th>
                <td>Anaesthetic, analgesic, and sedative drugs</td>
                <td>choose from select</td>
                <td>choose from select </td>
                <td>choose from select</td>
                <td>choose from select</td>
                <td>choose from select</td>
                <td>$45.50</td>
                <td><a href="?action=add&id=1">Add to order</a></td>
            </tr>
            <tr>
                <th scope="row">Dexmedetomidine</th>
                <td>Anaesthetic, analgesic, and sedative drugs</td>
                <td>choose from select</td>
                <td>choose from select </td>
                <td>choose from select</td>
                <td>choose from select</td>
                <td>choose from select</td>
                <td>$45.50</td>
                <td><a href="?action=add&id=1">Add to order</a></td>
            </tr>
            <tr>
                <th scope="row">Lidocaine</th>
                <td>Anaesthetic, analgesic, and sedative drugs</td>
                <td>choose from select</td>
                <td>choose from select </td>
                <td>choose from select</td>
                <td>choose from select</td>
                <td>choose from select</td>
                <td>$45.50</td>
                <td><a href="?action=add&id=1">Add to order</a></td>
            </tr>
            </tbody>
        </table>

    </div>
   <?php
    }

    static function displayOrdersDetails(/*Laptop $laptop*/) {?>
    <!-- detail section -->
    <div class="p-5">

<table class="table table-striped table-bordered table-hover">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Date</th>
        <th scope="col">PST</th>
        <th scope="col">GST</th>
        <th scope="col">Total</th>
        <th scope="col">Details</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th scope="row">1</th>
        <td>Jul-24-2023</td>
        <td>$7.00</td>
        <td>$5.00 </td>
        <td>$55.50</td>
        <td><a href="?action=details&id=1">Details</a></td>
    </tr>
    <tr>
        <th scope="row">1</th>
        <td>Jul-22-2023</td>
        <td>$14.00</td>
        <td>$10.00 </td>
        <td>$110.50</td>
        <td><a href="?action=details&id=1">Details</a></td>
    </tr>
    <tr>
        <th scope="row">1</th>
        <td>Jul-21-2023</td>
        <td>$9.50</td>
        <td>$7.00 </td>
        <td>$64.69</td>
        <td><a href="?action=details&id=1">Details</a></td>
    </tr>
    </tbody>
</table>

</div>
                
    <?php  }

    static function displayLoginForm(){?>
    <!-- login section -->
    <section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card bg-info text-white" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">
  
              <div class="mb-md-5 mt-md-4 pb-5">
  
                <h2 class="fw-bold mb-2 text-uppercase">Log In</h2>
                <p class="text-white-50 mb-5">Please enter your username and password!</p>
  
                <div class="form-outline form-white mb-4">
                  <input type="email" name="username" id="username" class="form-control form-control-lg" />
                  <label class="form-label" for="username">Username</label>
                </div>
  
                <div class="form-outline form-white mb-4">
                  <input type="password" name="password" id="password" class="form-control form-control-lg" />
                  <label class="form-label" for="password">Password</label>
                </div>
  
                <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p>
                
                <input type="hidden" name="action" value="logIn">
                <button class="btn btn-outline-light btn-lg px-5" type="submit" value="log">Login</button>
  
              </div>
  
              <div>
                <p class="mb-0 font-weight-bold">Don't have an account? <a href="#!" class="text-white-50 fw-bold">Register</a>
                </p>
              </div>
  
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
    <?php  }

    static function displayLogoutForm(/*Member $m*/){?>
    <!-- logout section -->
    <section class="logout">
            <h2>Login Details</h2>
            <div class="form-group row">
                <div class="col-md-6">
                    <span>Hi <?php echo $m->getUserName();?></span>
                    <a class="btn btn-primary" href="userLogout.php" role="button">Logout</a>
                </div>                                
    </div>
        </section>
    <?php }

static function displayRegisterForm(){?>
    <!-- Regiater section -->
    <section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-info text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 text-uppercase">Register</h2>
              <p class="text-white-50 mb-5">Please enter the information to create an account!</p>



              <div class="form-outline form-white mb-4">
                <input type="text" name="firstName" id="firstName" class="form-control form-control-sm" />
                <label class="form-label" for="firstName">First Name</label>
              </div>

              
              <div class="form-outline form-white mb-4">
                <input type="text" name="lastName" id="lastName" class="form-control form-control-sm" />
                <label class="form-label" for="lastName">Last Name</label>
              </div>

              <div class="form-outline form-white mb-4">
                <input type="text" name="address" id="address" class="form-control form-control-sm" />
                <label class="form-label" for="address">Address</label>
              </div>

              <div class="form-outline form-white mb-4">
                <input type="text" name="city" id="city" class="form-control form-control-sm" />
                <label class="form-label" for="city">City</label>
              </div>

              <div class="form-outline form-white mb-4">
                <select class="form-control form-control-sm" name="province" id="province">
                  <option value="AB">AB</option>
                  <option value="BC">BC</option>
                  <option value="MB">MB</option>
                  <option value="NB">NB</option>
                  <option value="NL">NL</option>
                  <option value="NT">NT</option>
                  <option value="NS">NS</option>
                  <option value="NU">NU</option>
                  <option value="ON">ON</option>
                  <option value="PE">PE</option>
                  <option value="QC">QC</option>
                  <option value="SK">SK</option>
                  <option value="YT">YT</option>
                </select>
                <label class="form-label" for="province">Province</label>
              </div>

              <div class="form-outline form-white mb-4">
                <input type="text" name="postalCode" id="postalCode" class="form-control form-control-sm" />
                <label class="form-label" for="postalCode">Postal Code</label>
              </div>

              <div class="form-outline form-white mb-4">
                <input type="email" name="email" id="email" class="form-control form-control-sm" />
                <label class="form-label" for="email">Email</label>
              </div>

              <div class="form-outline form-white mb-4">
                <input type="text" name="phone" id="phone" class="form-control form-control-sm" />
                <label class="form-label" for="phone">Phone Number</label>
              </div>

              <div class="form-outline form-white mb-4">
                <input type="text" name="usernameRegister" id="usernameRegister" class="form-control form-control-sm" />
                <label class="form-label" for="usernameRegister">Username</label>
              </div>

              <div class="form-outline form-white mb-4">
                <input type="password" name="passwordRegister" id="passwordRegister" class="form-control form-control-sm" />
                <label class="form-label" for="passwordRegister">Password</label>
              </div>
              <input type="hidden" name="action" value="register">
              <button class="btn btn-outline-light btn-lg px-5" type="submit" value="createAccount">Create Account</button>

            </div>

            <div>
              <p class="mb-0 font-weight-bold">Already have an account? <a href="#!" class="text-white-50 fw-bold">Log In</a>
              </p>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  
    <?php }


}