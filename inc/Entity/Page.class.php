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


    
    static function displayHeader($currentPageStyles) {
        ?>
                  <!DOCTYPE html>
            <html lang="en">
            <head>
              <meta charset="UTF-8">
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <title>Pharma-Vet</title>
              <!-- Add Bootstrap CSS -->
              <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
              <link href="css/<?=$currentPageStyles?>" rel="stylesheet">

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
                      <a class="nav-link" href="#">My Orders</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Profile</a>
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
            <p>1. Log In</p>
            <p>2. Place your order</p>
            <p>3. Receive your order</p>
            <br>
            <p>
              <a href="#" class="btn btn-info btn-lg">Login</a>
              <a href="#" class="btn btn-outline-info btn-lg">Register</a>
            </p>
          </div>
          </div>
  
          <?php  
          }

          //Add pet
        static function addPetForm()    {
            ?>
            <!-- Add Pet -->
  <br>
  <div class="container">
  <h1 class="text-center">Add your pets</h1>
  <form class="addPetForm" action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
  <label for="petName">Pet's Name</label>
  <input type="text" class="form-control" name="petName" id="petName" placeholder="Nice Name">
  </div>
  <div class="form-group">
    <label for="petType">Pet's Type</label>
    <select class="form-control" name="petType" id="petType">
      <option>Select...</option>
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
  <div class="d-flex justify-content-center">
  <input type="hidden" name="action" value="addPet">
  <button type="submit" class="btn btn-info btn-block" value="addMascot">Submit</button>
</div>
  </form>
  </div>
    
            <?php  
            }

    static function petFormNotifications(array $notifications){
      ?>
   <!-- Mascot Errors -->
   <div class="p-5">
    <div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">Mascot Cannot Be Added!</h4>
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

    static function petFormSuccesful(Pet $pet){
      ?>
                 <!-- Mascot Added Succesfully -->
  <div class="p-5">
    <div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Mascot Added Succesfully!</h4>
    <hr>

    <table class="table table-bordered table-hover" >
      <tbody>
        <tr>
          <th scope="row">Name:</th>
          <td><?=$pet->getName()?></td>
        </tr>
        <tr>
          <th scope="row">Type:</th>
          <td><?=$pet->getType()?></td>
        </tr>
        <tr>
          <th scope="row">Image:</th>
          <td>
            <?php
             echo "<img src=\"./petsImages/{$pet->getPetPicture()}\" class=\"img-thumbnail img-fluis\" width=\"200px\">";
             ?>
          </td>
        </tr>
      </tbody>
    </table> 
    <p class="mb-0">Thank you for adding your best friend!</p>
  </div>
  </div>
      <?php
    }
  

    //Add Order page
    static function displayMedicinesTable(Array $medicines, $action, $preOrder=null) {
      ?>

  <!-- Medicines table -->
  <br>

    <div class="p-5">

    <div class="container">
  <div class="row">
    <div class="col">
    <form action="<?=$_SERVER["PHP_SELF"]?>" method="get">
    <input type="text" name="activeDrug" class="searchInput" placeholder="Search active drugs">
      <div class="d-flex justify-content-around">
        <input type="hidden" name="state" value="<?=$action?>">
        <?php $preOrderId=0;if($preOrder!=null){$preOrderId= $preOrder["0"]->getOrderId();}?>
        <input type="hidden" name="preOrderId" value="<?=$preOrderId?>">
      <input type="hidden" name="action" value="searchActiveDrug">
        <button class="btn btn-primary" type="submit" value="Search ActiveDrug">Search Active Drugs</button>
        </div>
    </form>
    </div>
    <div class="col">
    <form action="<?=$_SERVER["PHP_SELF"]?>" method="get">
    <input type="text" name="category" class="searchInput" placeholder="Search Category">
    <div class="d-flex justify-content-around">
    <input type="hidden" name="state" value="<?=$action?>">
        <?php if($preOrder!=null){$preOrderId= $preOrder["0"]->getOrderId();}?>
        <input type="hidden" name="preOrderId" value="<?=$preOrderId?>">
      <input type="hidden" name="action" value="searchCategory">
        <button class="btn btn-primary" type="submit" value="Search Category">Search Category</button>
        </div>
    </form>
    </div>
  </div>
      <br>
        <table class="table table-striped table-bordered table-hover table-responsive-md">
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
              $containedMedicines=array();
              if($preOrder!=null){
                foreach($preOrder as $item){
                  array_push($containedMedicines, $item->Medicine_Id);
                }
              }
              //List the medicines
              foreach($medicines as $medicine){
                if(!in_array($medicine->getMedicineId(),$containedMedicines)){
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
                if($preOrder!=null){
                  $subtotal=0;
                  echo "<input type=\"hidden\" name=\"preOrderId\" value=\"{$preOrder["0"]->getOrderId()}\">";
                  echo "<input type=\"hidden\" name=\"preOrderDate\" value=\"{$preOrder["0"]->getOrderDate()}\">";
                  echo "<input type=\"hidden\" name=\"pst\" value=\"0.0\">";
                  foreach($preOrder as $orderItem){
                    $subtotal+=$orderItem->SumPrice;
                  }
                  $gst=$subtotal*0.05;
                  echo "<input type=\"hidden\" name=\"gst\" value=\"{$gst}\">";
                  $total=$gst+$subtotal;
                  echo "<input type=\"hidden\" name=\"totalPrice\" value=\"{$total}\">";
                  echo "<input type=\"hidden\" name=\"clientsId\" value=\"{$preOrder["0"]->getClients_Id()}\">";
                }
                echo "<input type=\"hidden\" name=\"price\" value=\"{$medicine->getUnitPrice()}\">";
                echo "<input type=\"hidden\" name=\"action\" value=\"{$action}\">";
                echo "<td><input class=\"btn-info btn-sm\" type=\"submit\" value=\"Add Medicine\"></td>";
                //echo "<td><a href=\"?action=add&id={$medicine->getMedicineId()}\">Add to order</a></td>";
                echo "</form>";
                echo "</tr>";
              }
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
              //List the medicines in preorder
              $count=1;
              $subtotal=0;
              echo "<input type=\"hidden\" name=\"orderId\" value=\"{$preOrder["0"]->getOrderId()}\">";
              echo "<input type=\"hidden\" name=\"orderDate\" value=\"{$preOrder["0"]->getOrderDate()}\">";
              foreach($preOrder as $orderItem){
                    echo "<tr>";
                    echo "<input type=\"hidden\" name=\"medicineId\" value=\"{$orderItem->Medicine_Id}\">";
                    echo "<input type=\"hidden\" name=\"concentration{$count}\" value=\"{$orderItem->Concentration}\">";
                    echo "<input type=\"hidden\" name=\"presentation{$count}\" value=\"{$orderItem->Presentation}\">";
                    echo "<input type=\"hidden\" name=\"size{$count}\" value=\"{$orderItem->Size}\">";
                    echo "<input type=\"hidden\" name=\"flavor{$count}\" value=\"{$orderItem->Flavor}\">";
                    echo "<input type=\"hidden\" name=\"quantity{$count}\" value=\"{$orderItem->Quantity}\">";
                    echo "<input type=\"hidden\" name=\"sumPrice{$count}\" value=\"{$orderItem->SumPrice}\">";
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
              $count=$count-1;
              echo "<input type=\"hidden\" name=\"totalItems\" value=\"{$count}\">";
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
    </div>

      <div class="row">
        <div class="col">
        </div>
        <div class="col text-right">
          <?php
          $formatPrice="$".number_format($subtotal,2,".",",");
          echo "Subtotal: <strong>{$formatPrice}</strong><br>";
          echo "<input type=\"hidden\" name=\"subtotal\" value=\"{$subtotal}\">";
          echo "PST 0%: <strong>$0.00</strong><br>";
          echo "<input type=\"hidden\" name=\"pst\" value=\"0.0\">";
          $gst=$subtotal*0.05;
          $formatPrice="$".number_format($gst,2,".",",");
          echo "GST 5%: <strong>{$formatPrice}</strong><br>";
          echo "<input type=\"hidden\" name=\"gst\" value=\"{$gst}\">";
          $total=$gst+$subtotal;
          $formatPrice="$".number_format($total,2,".",",");
          echo "Total: <strong>{$formatPrice}</strong><br>";
          echo "<input type=\"hidden\" name=\"grandTotal\" value=\"{$total}\">";
          echo "<input type=\"hidden\" name=\"clientsId\" value=\"{$preOrder["0"]->getClients_Id()}\">";
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
        <input type="hidden" name="action" value="confirmOrder">
        <input class="btn-success btn-lg btn-block" type="submit" value="ConfirmOrder">
          </form>
        </div>
        <div class="col text-center">
        <form action="<?=$_SERVER["PHP_SELF"]?>" method="post">
        <input type="hidden" name="action" value="cancelOrder">
        <?php
        echo "<input type=\"hidden\" name=\"clientsId\" value=\"{$preOrder["0"]->getClients_Id()}\">";
        echo "<input type=\"hidden\" name=\"orderId\" value=\"{$preOrder["0"]->getOrderId()}\">";
        ?>
          <input class="btn-danger btn-lg btn-block" type="submit" value="cancelOrder">
        </form>
        </div>
      </div>
     
    </div>

      <?php
    }

    static function displaySuccesOrderMessage(){
      ?>
      <div class="p-5">
        <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Order Created Succesfully!</h4>
        <hr>
        <p class="mb-0">Thank you for placing an order, you can see your previous order in your profile</p>
      </div>
      </div>
      <?php
    }

    static function displayCancelOrderMessage(){
      ?>
      <div class="p-5">
        <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">Order Cancelled</h4>
        <hr>
        <p class="mb-0">The order was not created!</p>
      </div>
      </div>
      <?php
    }


//Past orders page
    static function displayOrdersTable(Array $ordersList) {
      ?>
          <!-- Past orders table -->
    <div class="p-5">
        <h1>[Username] past orders: </h1>   <!-- CHANGE THIS TO THE USERNAME THAT IS LOGGED IN --> 
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
                <th scope="col">Edit</th>
                <th scope="col">Details</th>
            </tr>
            </thead>
            <tbody>
              <?php
              //list orders
              $count=1;
              foreach($ordersList as $order){    ///CHECK FOR CLIENTS ID IN SESSION AND COMPARE WITH CLIENTS ID IN ORDER OBJECT TO DISPLAY ONLY THAT CLIENTS ORDERS
                echo "<tr>";
                echo "<th scope=\"row\">{$count}</th>";
                echo "<td>{$order->getOrderId()}</td>";
                echo "<td>{$order->getOrderDate()}</td>";
                $formatPrice="$".number_format($order->getPST(),2,".",",");
                echo "<td>{$formatPrice}</td>";
                $formatPrice="$".number_format($order->getGST(),2,".",",");
                echo "<td>{$formatPrice}</td>";
                $formatPrice="$".number_format($order->getTotalPrice(),2,".",",");
                echo "<td>{$formatPrice}</td>";
                echo "<td><a href=\"PlaceOrder.php?state=addMedicine&preOrderId={$order->getOrderId()}\">Edit</a></td>";
                echo "<td><a href=\"?action=details&orderId={$order->getOrderId()}\">Details</a></td>";
                echo "</tr>";
                $count++;
              }
              ?>
            </tbody>
        </table>
    </div>
                
    <?php 
     }

      static function displayOrderDetails(Array $orderInfo){
        ?>

              <!-- Selected order details -->
      <div class="p-5">
        <a href="?action=listOrders">Hide details</a><br>
        <h4 class="text-center">Order #<?=$orderInfo["0"]->getOrderId()?> : </h4>
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
                  <?php
                  //Display medicines info
                  $count=1;
                  $subtotal=0;
                  foreach($orderInfo as $item){
                    echo "<tr>";
                    echo "<th scope=\"row\">{$count}</th>";
                    echo "<td>{$item->ActiveDrug}</td>";
                    echo "<td>{$item->Concentration}</td>";
                    echo "<td>{$item->Presentation}</td>";
                    echo "<td>{$item->Size}</td>";
                    echo "<td>{$item->Flavor}</td>";
                    echo "<td>{$item->Quantity}</td>";
                    $formatPrice="$".number_format($item->SumPrice,2,".",",");
                    echo "<td>{$formatPrice}</td>";
                    echo "</tr>";
                    $count++;
                    $subtotal+=$item->SumPrice;
                  }
                  ?>
                </tbody>
            </table>
        </div>

          <div class="row">
            <div class="col">
            </div>
            <div class="col text-right">
            <?php
          $formatPrice="$".number_format($subtotal,2,".",",");
          echo "Subtotal: <strong>{$formatPrice}</strong><br>";
          $formatPrice="$".number_format($orderInfo["0"]->getPST(),2,".",",");
          echo "PST 0%: <strong>{$formatPrice}</strong><br>";
          $formatPrice="$".number_format($orderInfo["0"]->getGST(),2,".",",");
          echo "GST 5%: <strong>{$formatPrice}</strong><br>";
          $formatPrice="$".number_format($orderInfo["0"]->getTotalPrice(),2,".",",");
          echo "Total: <strong>{$formatPrice}</strong><br>";
          ?>
            </div>
          </div>  
    </div>
        <?php
      }


//Login page
    static function displayLoginForm(){?>
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

    static function displayLogoutForm(Member $m){?>
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