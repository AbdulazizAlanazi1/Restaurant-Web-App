<?php 
if(isset($_COOKIE['cart'])){
  $tempArr = array();
  $tempArr = explode(',', $_COOKIE['cart']);}
?>
<div class="navigation">
      <nav class="navbar navbar-expand-lg navbar-light " role="navigation">
        <a class="navbar-brand" href="#"> <img src="projectImages/logo-White.svg" alt="Nothing" id="logo" class="navbar-logo"> </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto navContainer">
            <li class="nav-item navElem1">
              <a class="navCol" href="index.php#Home">Home </a>
            </li>
            <li class="nav-item navElem1">
              <a class="navCol" href="index.php#Menu">Menu</a>
            </li>
            <li class="nav-item navElem1">
              <a class="navCol" href="index.php#Gallery">Gallery</a>
            </li>
            <li class="nav-item navElem1">
              <a class="navCol" href="index.php#Testimonials">Testimonials</a>
            </li>
            <li class="nav-item navElem1">
              <a class="navCol" href="index.php#ContactUs">Contact Us</a>
            </li>
            <li class="nav-item navElem2">
              <a class="navCol" href="index.php#Search">Search</a>
            </li>
            <li class="nav-item navElem2">
              <a class="navCol " href="">Profile</a>
            </li>
            <li class="nav-item navElem2">
              <?php
              echo('
              <a class="navCol " type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" id="cartButton">Cart</a>');
              if(isset($tempArr)){
                echo('<span id="numOfItems">'.count($tempArr).'</span>');}
              else{
                echo('<span id="numOfItems">0</span>');
            }
              ?>
            </li>
          </ul>
        </div>
      </nav>
      </div>  

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Cart Content</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">

        <div class="cartContainer">
          <div class="cartLeft">
            <p>Item</p>
            <?php 
            if(isset($tempArr)){
            for($n=0 ; $n<count($tempArr); $n++){
             echo("<p>".$myMeals -> getMealById(($tempArr[$n])-1)["title"]."</p>");
          }
        }
            ?>

            <p class="totalText">Total</p>
          </div>

          <div class="cartRight">
            <p>Price</p>
            <?php 
            $total =0.0;
          if(isset($tempArr)){
            for($k=0 ; $k<count($tempArr); $k++){
             echo("<p>".$myMeals -> getMealById(($tempArr[$k])-1)["price"]."</p>");
             $total += $myMeals -> getMealById(($tempArr[$k])-1)["price"];
          }
        }
            echo ('<p id="TotalPrice">'.$total.'</p>
            
          </div>
        </div>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn " id="closeButton" data-dismiss="modal">Close</button>

        <form action="order.php" method="POST" id="myOrder">
        <input type="hidden" name="back" value="'.$_SERVER["PHP_SELF"].'">
        <input type="hidden" name="total" value="'.$total.'">
        <button type="submit" form="myOrder" value="Submit" class="btn " id="orderButton" style="text-decoration:none; color: black;">Order Now</button>
        </form>
        ');
        ?>
      </div>
    </div>
  </div>
</div>

