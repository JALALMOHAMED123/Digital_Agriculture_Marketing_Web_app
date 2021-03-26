<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script type="text/javascript" src="products.js"></script>
  
    <title>Products</title>
    <style>
      .but{
        background-color: green;
        color:white;
        font:bold;
        font-size: 18px;
        transform: translateX(50px );
      }
      </style>
  </head>
  <body>
    <!-- navbar -->
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
      <a class="navbar-brand pl-5" href="#">Digital Agricultural Marketing</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active ">
            <a class="nav-link pr-4" href="home.html"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link pr-4" href="products.php"><i class="fa fa-product-hunt" aria-hidden="true"></i> Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link pr-4" href="upload.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Upload </a>
          </li>
          <li class="nav-item">
            <a class="nav-link pr-4" href="addcart.html"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Addcart</a>
          </li>
          <li class="nav-item">
            <a class="nav-link pr-4" href="schemes.html"><i class="fa fa-search-plus" aria-hidden="true"></i> Schemes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link pr-4" href="aboutus.html"><i class="fa fa-address-card" aria-hidden="true"></i> AboutUs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link pr-4" href="index.php"><i class="fa fa-address-card" aria-hidden="true"></i> Logout</a>
          </li>
          <li class="nav-item"><a class="nav-link" href="#"><i class="fab fa-twitter"></i></a></li>
          <li class="nav-item"><a class="nav-link" href="#"><i class="fab fa-facebook"></i></a></li>
          <li class="nav-item"><a class="nav-link" href="#"><i class="fab fa-telegram"></i></a></li>
          <li class="nav-item"><a class="nav-link" href="#"><i class="fab fa-youtube"></i></a></li>
        </ul>
      </div>
    </nav>
    <form action="#" method="post" onsubmit="validate();">
      <table align="center" class="tapro">
              <tr>
              <td><input type="text" placeholder="type" name="type" id="type"  ></input> </td>
              <td><input type="text" placeholder="district" name="dis" id="dist" ></input></td>
              <td><input type="text" placeholder="Sub district" name="subdis" id="subdist" ></input></td>
              <td><input type="submit" value="search" class="but" name="s"></td>
              </tr>
      </form>
          <div class="container py-5">
              <div class="row mt-4">
                  <?php
                       if(isset($_POST['s']))
                       {
                        $type=$_POST['type'];
                        $r1="/^([a-zA-Z0-9][a-zA-Z0-9.@]+)$/";
                        if(!preg_match($r1,$type))
                           echo " not matched";
                       }
                       if(isset($_POST['s']))
                       {
                        $district=$_POST['dis'];
                        $r2="/^([a-zA-Z0-9][a-zA-Z0-9.@]+)$/";
                        if(!preg_match($r2,$district))
                           echo " not matched";
                       }
                       if(isset($_POST['s']))
                       {
                        $sub_dis=$_POST['subdis'];
                        $r2="/^([a-zA-Z0-9][a-zA-Z0-9.@]+)$/";
                        if(!preg_match($r2,$sub_dis))
                           echo " not matched";
                       }
                  ?>
  
                  <?php
                  $co=mysqli_connect("localhost","root","","marketing");
                  if(isset($_POST['s']))
                  {
                     $type = $_POST['type'];
                     $district = $_POST['dis'];
                     $sub_dis = $_POST['subdis'];
                 
                     $q="select * from upload where type='$type'&& district='$district'&& sub_dis='$sub_dis'";
                     $query_run=mysqli_query($co,$q);
                     $check = mysqli_num_rows($query_run)>0;
                     if($check)
                     {
                          
                          while($row=mysqli_fetch_assoc($query_run))
                          {
                              ?>
                              <form>
                               <div class="col-md-3 mt-3">
                                  <div class="card">
                                      <img src="./image/<?php echo$row['img'];?>" width="255px" height="200px" alt="agri">    
                                      <div class="card-body">
                                      <h6 class="card-title"><label>Product Name : <?php echo $row['pname'];?></label</h6>
                                      <h6 class="card-title"><label>Price *per Kg: <?php echo $row['price'];?></label></h6>
                                      <h6 class="card-title"><label>Quantity     : <?php echo $row['quantity'];?></label></h6>
                                      <h6 class="card-title"><label>Farmer Name  : <?php echo $row['far_name'];?></label></h>
                                      <h6 class="card-title"><label >Call   :<a href="tel:<?php $row['ph_no']?>"> <?php echo $row['ph_no'];?></label></h6></a>
                                      <input type="text" class="quan"/> <br>
                                      <input type="button" class="but"value="Add Cart" >
                                  </div>
                                  </div>
                                </div>
                              </form>
                              <?php
                          }
                     }
                     else{
                       echo "no data found";
                     }
                  }
                  else
                  {
                  $q="select * from upload";
                  $query_run = mysqli_query($co,$q);
                  $check = mysqli_num_rows($query_run)>0;
  
                  if($check)
                  {
                      while($row=mysqli_fetch_assoc($query_run))
                      {
                          ?>
                           <div class="col-md-3 mt-3">
                              <div class="card">
                                  <img src="./image/<?php echo$row['img'];?>" width="255px" height="200px" alt="agri">    
                                  <div class="card-body">
                                      <h6 class="card-title"><label>Product Name : <?php echo $row['pname'];?></label</h6>
                                      <h6 class="card-title"><label>Price *per Kg: <?php echo $row['price'];?></label></h6>
                                      <h6 class="card-title"><label>Quantity     : <?php echo $row['quantity'];?></label></h6>
                                      <h6 class="card-title"><label>Farmer Name  : <?php echo $row['far_name'];?></label></h>
                                      <h6 class="card-title"><label class="fa fa call">Call   : <a href="tel:<?php $row['ph_no']?>"><?php echo $row['ph_no'];?></label></h6></a>
                                      <input type="text" class="quan"/>
                                      <input type="button" class="but" value="Add Cart" />
                                  </div>
                              </div>
                            </div>
                          <?php
                      }
                  }
                  else
                  {
                      echo "no data found";
                  }
              }
                  ?>
                 
              </div>
          </div>
         
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>