<?php

// MAKE SURE TO MAKE A BACKUP COPY OF THIS FILE BEFORE WORKING ON THE AUTHENTICATION REQUIREMENT

class Page  {

    public static $heading = "Veterinary ";
    public static $studentID = "";
    public static $studentName ="Luiz and Oliver";
    public static $member;
    public static $concentrations=["5 mg/ml","10 mg/ml","15 mg/ml","20 mg/ml", "25 mg/ml", "50 mg/ml", "100 mg/ml"];
    public static $presentations=["Oil suspension","Liquid Aqueous","In Lipoderm Cream","In Versabase Cream", "Ointment", "Injection", "Topic Solution"];
    public static $sizes=["15 ml","30 ml","60 ml","100 ml", "120 ml", "150 ml", "250 ml", "500 ml", "1000 ml"];
    public static $flavors=["no flavor","chicken","bacon","beef", "fish", "salmon", "liver"];


    
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
              <link href="css/basicStyles.css" rel="stylesheet">

            </head>
            <body>
              <!-- Navbar -->
              <nav class="navbar navbar-expand-md">
                <a class="navbar-brand" href="ProjectMainBackup.php">
                  <img src="./images/veterinary-medicine.svg" width="30" height="30" class="d-inline-block align-top" alt="">
                  Pharma-Vet</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">

                  <?PHP
                    if(LoginManager::verifyLogin()){
                      ?>
                      <ul class="navbar-nav ml-auto">
                  <li class="nav-item">
                      <a class="nav-link" href="#">Place Order</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">My Orders</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="userProfile.php">Profile</a>
                    </li>
                    <li class="nav-item">
                      <a class="btn btn-info" href="userLogout.php">Log Out</a>
                    </li>
                  </ul>

                      <?PHP
                    }else{
                      ?>
                      
                        <ul class="navbar-nav ml-auto">
                        <form class="navbar-nav ml-auto" method="post">
                  <li class="nav-item">
                      <a class="nav-link" href="ProjectMainBackup.php">Home</a>
                    </li>
                    
                    <li class="nav-item">
                    <button type="submit" name="loginBtn" class="btn btn-info">Login</button>
                    </li>
                    <li class="nav-item">
                    <button type="submit" name="registerBtn" class="btn btn-outline-info">Register</button>
                    </li>
                    </form>
                  </ul>
                      

                      <?php
                    }
                  ?>
                </div>
              </nav>
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

//Home page
      static function displayHomePage()    {
          ?>
          <!-- Jumbotron -->
          <div class="hero-image">
          <div class="jumbotron text-center">
            <h1 class="display-4">Welcome to Pharma-Vet!</h1>
            <p class="lead">Order your pets medicine and receive it at your house in 3 simple steps:</p>
            <p>1. Log In or Register if you don't have an account</p>
            <p>2. Place your order</p>
            <p>3. Receive your order</p>
            <br>
            <form method="post">
            <p>
            <button type="submit" name="loginBtn" class="btn btn-info btn-lg">Login</button>
            <button type="submit" name="registerBtn" class="btn btn-outline-info btn-lg">Register</button>
            </p>
            </form>
          </div>
          </div>
  
          <?php  
          }

          //Add pet
        static function addPetForm()    {
            ?>
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
    
            <?php  
            }

    static function petFormNotifications(){
      ?>
      <section class="sidebar">
      <!-- Start the page's error notification -->
      <div class="highlight">
          <p>Please fix the following errors:</p>
          <ul>
              <li>Error 1</li>
              <li>Error 2</li>
          </ul>                                        
      </div>
      <?php  
    }

    static function petFormSuccesful(){
      ?>
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

      <?php
    }
    

        

    static function displayMedicinesTable(Array $medicines) {
      ?>

  <!-- Medicines table -->
  <br>
    <div class="p-5 table-responsive">
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
                <th scope="col">Price per unit</th>
                <th scope="col">Add to order</th>
            </tr>
            </thead>
            <tbody>
              <?php
              //List the medicines
              foreach($medicines as $medicine){
                echo "<tr>";
                echo "<form action=\"{$_SERVER["PHP_SELF"]}\" method=\"post\">";
                echo "<input type=\"hidden\" name=\"medicineid\" value=\"{$medicine->getMedicineId()}\">";
                echo "<input type=\"hidden\" name=\"medicine\" id=\"medicine\" value=\"{$medicine->getActiveDrug()}\">";
                echo "<th scope=\"row\">{$medicine->getActiveDrug()}</th>";
                echo "<td>{$medicine->getCategory()}</td>";
                echo "<td><select name=\"concentration\">";
                    $count=1;
                    foreach(self::$concentrations as $concentration){
                      echo "<option value=\"{$concentration}\">{$concentration}</option>";
                      $count++;
                    }
                echo "</td>";
                echo "<td><select name=\"presentation\">";
                    $count=1;
                    foreach(self::$presentations as $presentation){
                      echo "<option value=\"{$presentation}\">{$presentation}</option>";
                      $count++;
                    }
                echo "</td>";
                echo "<td><select name=\"size\">";
                    $count=1;
                    foreach(self::$sizes as $size){
                      echo "<option value=\"{$size}\">{$size}</option>";
                      $count++;
                    }
                echo "</td>";
                echo "<td><select name=\"flavor\">";
                    $count=1;
                    foreach(self::$flavors as $flavor){
                      echo "<option value=\"{$flavor}\">{$flavor}</option>";
                      $count++;
                    }
                echo "</td>";
                echo "</td>";
                echo "<td><select name=\"quantity\">";
                    $count=1;
                    while($count<11){
                      echo "<option value=\"{$count}\">{$count}</option>";
                      $count++;
                    }
                echo "</td>";
                $price="$".number_format($medicine->getUnitPrice(),2,".",",");
                echo "<td>{$price}</td>";
                echo "<input type=\"hidden\" name=\"price\" value=\"{$medicine->getUnitPrice()}\">";
                echo "<input type=\"hidden\" name=\"action\" value=\"addMedicine\">";
                echo "<td><input class=\"btn-info btn-sm\" type=\"submit\" value=\"Add Medicine\"></td>";
                //echo "<td><a href=\"?action=add&id={$medicine->getMedicineId()}\">Add to order</a></td>";
                echo "</form>";
                echo "</tr>";
              }

              ?>
<!--             <tr>
                <th scope="row">Medetomidine</th>
                <td>Anaesthetic, analgesic, and sedative drugs</td>
                <td>choose from select</td>
                <td>choose from select </td>
                <td>choose from select</td>
                <td>choose from select</td>
                <td>choose from select</td>
                <td>$45.50</td>
                <td><a href="?action=add&id=1">Add to order</a></td>
            </tr> -->
            </tbody>
        </table>

    </div>
   <?php
    }

    //receives array with ordered_meds and order info
    static function orderConfirmation($preOrder){
      ?>
        <!-- Order confirmation table -->
  <div class="p-5">
  <form action="<?=$_SERVER["PHP_SELF"]?>" method="post">
    <h4 class="text-center">Order # <?= $preOrder["0"]->getOrderId();?> confirmation: </h4>
    <div class="container">
      <div class="p-5 table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Active Drug</th>
                <th scope="col">Concentration</th>
                <th scope="col">Presentation</th>
                <th scope="col">Size</th>
                <th scope="col">Flavor</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total Price</th>
            </tr>
            </thead>
            <tbody>
            
            <?php
              //List the medicines
              $count=1;
              $subtotal=0;
              echo "<input type=\"hidden\" name=\"orderId\" value=\"{$preOrder["0"]->getOrderId()}\">";
              echo "<input type=\"hidden\" name=\"orderDate\" value=\"{$preOrder["0"]->getOrderDate()}\">";
              foreach($preOrder as $orderItem){
                    echo "<tr>";
                    echo "<input type=\"hidden\" name=\"medicineId\" value=\"{$orderItem->Medicine_Id}\">"; //add the count number at name know how many we have
                    echo "<input type=\"hidden\" name=\"concentration\" value=\"{$orderItem->Concentration}\">";
                    echo "<input type=\"hidden\" name=\"presentation\" value=\"{$orderItem->Presentation}\">";
                    echo "<input type=\"hidden\" name=\"size\" value=\"{$orderItem->Size}\">";
                    echo "<input type=\"hidden\" name=\"flavor\" value=\"{$orderItem->Flavor}\">";
                    echo "<input type=\"hidden\" name=\"quantity\" value=\"{$orderItem->Quantity}\">";
                    echo "<input type=\"hidden\" name=\"sumPrice\" value=\"{$orderItem->SumPrice}\">";
                    echo "<th scope=\"row\">{$count}</th>";
                    echo "<td>{$orderItem->ActiveDrug}</td>";
                    echo "<td>{$orderItem->Concentration}</td>";
                    echo "<td>{$orderItem->Presentation}</td>";
                    echo "<td>{$orderItem->Size}</td>";
                    echo "<td>{$orderItem->Flavor}</td>";
                    echo "<td>{$orderItem->Quantity}</td>";
                    $price="$".number_format($orderItem->SumPrice,2,".",",");
                    echo "<td>{$price}</td>";
                    echo "</tr>";
                    $count++;
                    $subtotal+=$orderItem->SumPrice;
              }
                ?>
<!--             <tr>
                <th scope="row">1</th>
                <td>Buprenorphine</td>
                <td>2mg/ml</td>
                <td>Oil suspension </td>
                <td>100ml</td>
                <td>Chicken</td>
                <td>2</td>
                <td>$35.50</td>
            </tr> -->
            </tbody>
        </table>
      </form>
    </div>

      <div class="row">
        <div class="col">
        </div>
        <div class="col text-right">
          <?php
          $formatPrice="$".number_format($subtotal,2,".",",");
          echo "Subtotal: <strong>{$formatPrice}</strong><br>";
          echo "PST 0%: <strong>$0.00</strong><br>";
          $gst=$subtotal*0.05;
          $formatPrice="$".number_format($gst,2,".",",");
          echo "GST 5%: <strong>{$formatPrice}</strong><br>";
          $total=$gst+$subtotal;
          $formatPrice="$".number_format($total,2,".",",");
          echo "Total: <strong>{$formatPrice}</strong><br>";
          ?>

          <strong>*Medications exempt PST in BC</strong>
<!--           Subtotal: <strong>$35.50</strong><br>
          PST: <strong>$2.50</strong><br>
          GST: <strong>$1.78</strong><br>
          Total: <strong>$ 39.78</strong><br> -->
        </div>
      </div>  
      <h5>*Add more products from the table below, confirm your order or cancel.</h5>
      <div class="row">
        <div class="col">
          <input type="hidden" name="action" value="cancelOrder">
          <input class="btn-danger btn-lg btn-block" type="submit" value="CancelOrder">
        </div>
        <div class="col text-center">
        <input type="hidden" name="action" value="confirmOrder">
        <input class="btn-success btn-lg btn-block" type="submit" value="ConfirmOrder">
        </div>
      </div>
    </div>

      <?php
    }


//Past orders page
    static function displayOrdersTable(User $user) {
      ?>
          <!-- Past orders table -->
    <div class="p-5">
        <h1><?php echo $user->getUsername();?> past orders: </h1>
        <br>
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Order #</th>
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
                <td>10255</td>
                <td>Jul-24-2023</td>
                <td>$7.00</td>
                <td>$5.00 </td>
                <td>$55.50</td>
                <td><a href="?action=details&id=1">Details</a></td>
            </tr>
            <tr>
                <th scope="row">1</th>
                <td>10234</td>
                <td>Jul-22-2023</td>
                <td>$14.00</td>
                <td>$10.00 </td>
                <td>$110.50</td>
                <td><a href="?action=details&id=1">Details</a></td>
            </tr>
            <tr>
                <th scope="row">1</th>
                <td>10123</td>
                <td>Jul-21-2023</td>
                <td>$9.50</td>
                <td>$7.00 </td>
                <td>$64.69</td>
                <td><a href="?action=details&id=1">Details</a></td>
            </tr>
            </tbody>
        </table>
    </div>
                
    <?php 
     }

      static function displayOrderDetails(){
        ?>

              <!-- Selected order details -->
      <div class="p-5">
        <a href="?action=details&id=1">Hide details</a><br>
        <h4 class="text-center">Order # [number]: </h4>
        <br>
        <div class="container">
          <div class="row">
            <div class="col">
              First Name: <strong>name</strong><br>
              Last Name: <strong>name</strong><br>
              Email: <strong>email</strong><br>
              Phone: <strong>phone</strong><br>
              Order Date: <strong>date</strong><br>
            </div>
            <div class="col text-right">
              Address: <strong>address</strong><br>
              City: <strong>city</strong><br>
              Postal Code: <strong>PC</strong><br>
              Province: <strong>province</strong><br>
            </div>
          </div>

          <div class="p-5">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Active Drug</th>
                    <th scope="col">Concentration</th>
                    <th scope="col">Presentation</th>
                    <th scope="col">Size</th>
                    <th scope="col">Flavor</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total Price</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Buprenorphine</td>
                    <td>2mg/ml</td>
                    <td>Oil suspension </td>
                    <td>100ml</td>
                    <td>Chicken</td>
                    <td>2</td>
                    <td>$35.50</td>
                </tr>
                </tbody>
            </table>
        </div>

          <div class="row">
            <div class="col">
            </div>
            <div class="col text-right">
              Subtotal: <strong>$35.50</strong><br>
              PST: <strong>$2.50</strong><br>
              GST: <strong>$1.78</strong><br>
              Total: <strong>$ 39.78</strong><br>
            </div>
          </div>  
    </div>
        <?php
      }

//Login page
static function displayLoginForm() {
  ?>
  <!-- LogIn Form -->
  <section class="vh-100 gradient-custom">
      <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
              <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                  <div class="card bg-info text-white" style="border-radius: 1rem;">
                      <div class="card-body p-5 text-center">
                          <div class="mb-md-5 mt-md-4 pb-5">
                              <h2 class="fw-bold mb-2 text-uppercase">Log In</h2>
                              <p class="text-white-50 mb-5">Please enter your username and password!</p>

                              <!-- Add the form element -->
                              <form method="POST">
                                  <div class="form-outline form-white mb-4">
                                      <!-- Use the correct name attributes -->
                                      <input type="text" name="username" id="username" class="form-control form-control-lg" />
                                      <label class="form-label" for="username">Username</label>
                                  </div>

                                  <div class="form-outline form-white mb-4">
                                      <!-- Use the correct name attributes -->
                                      <input type="password" name="password" id="password" class="form-control form-control-lg" />
                                      <label class="form-label" for="password">Password</label>
                                  </div>

                                  <!-- Use a submit button -->
                                  <input type="hidden" name="action" value="logIn">
                                  <button class="btn btn-outline-light btn-lg px-5" type="submit" value="log">Login</button>
                              </form>
                          </div>

                          <div>
                              <p class="mb-0 font-weight-bold">Don't have an account? <a href="#!" class="text-white-50 fw-bold">Register</a></p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <?php
}

static function diplayLoginErrorMessage(){
  ?>
             <!-- Mascot Errors -->
             <div class="p-5">
            <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Login Failed!</h4>
            <hr>
            <p class="mb-0">Username and password do not match! Please try again.
            </p>
            <ul>
             
          </ul>
          </div>
          </div>
  <?php
}

    static function displayLogoutForm(User $m){?>
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
      <!--Register form-->
<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-info text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 text-uppercase">Register</h2>
              <p class="text-white-50 mb-5">Please enter the information to create an account!</p>


              <form method="POST">
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
              </form>
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

    static function showRegisterFormNotifications(array $notifications){
      ?>
              <!-- Mascot Errors -->
          <div class="p-5">
            <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Register Failed!</h4>
            <hr>
            <p class="mb-0">Please fix the following errors:</p>
            <ul>
              <?php
              foreach($notifications as $key => $val){
                if($key=="status" || $val=="Correct")
                    continue;
                echo "<li>{$val}</li>";
            }
              ?>
          </ul>
          </div>
          </div>
      <?php 
    }

    static function showUserDetails(User $user){
      ?>
      <div class="p-5">
    <h1>Welcome, <?php echo $user->getUsername(); ?>!</h1>
</div>
<?php
    }


}