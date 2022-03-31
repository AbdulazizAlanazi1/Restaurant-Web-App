<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="This is team 13's website">
    <title>Main Page</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="app.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>

  <?php
    include "php/meals.php";
    require_once "php/meal_db.php";
    $connection = new Connection();
    $AllMeals = $connection -> getAllMeals();
?>

  <body>

    <?php
    include "include/inc.header.php";
    ?>
    
    <section >
    <div id="Home">
      <div class="marg">
        <h1 id="partyTime">Party Time</h1>
        <div id="yellowRibbon"> <span></span>
        <h3 >Buy any 2 burgers and get 1.5L pepsi Free</h3>
        </div>
        <button type="button" class="mybutton" onclick="addOneToCart()">Orderd Now</button>
      </div>
    </div>
    </section>

    <section>
      <div id="Gallery">
        <div class="menuFirst marg">
          <h2>Want To Eat</h2>
          <p>Try our most delicious fod and usually take minutes to deliver</p>
        </div>
        <div class="menuSecond marg">
          <div class="menuSecondCont">
            <a href="#pizza">pizza</a> 
            <a href="#fastfood">fast food</a>
            <a href="#cupcake">cupcake</a> 
            <a href="#sandwich">sandwich</a> 
            <a href="#spaghetti">spaghetti</a> 
            <a href="#burger">burger</a>         
          </div>
        </div>
      </div>

      <div class="menuThird">
        <div class="delItem1">
        <img src="projectImages/delivery.png" alt="nothing" >
        </div>
        <div class="delItem2">
          <div class="TShape "> <span></span>
            <h2 id="guarantee">WE guarantee 30 minutes delivery</h2>
          </div>    
          <p id="ThirdP">If you are havig a meeting, working late at night and need an extra push</p>
          </div>
    </div>
    </section>

    <?php 
    if(isset($_COOKIE["recent-bought"])){
      $tempContainer = array();
      $tempContainer = explode(',', $_COOKIE['recent-bought']);
    echo('
    <section>
  <div class="MenuHeader">
  <h3 id="Menu"> Your Recent Bought Products</h3>
  </div>
  <div class="container">
    <div class="row">');
    for($i=0 ; $i < count($tempContainer); $i++){
      $currentMeal = $connection -> getMealsById($tempContainer[$i]);
          echo ('<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
          <div class="itemBorder">
            <a href="detail.php?id='.$tempContainer[$i].'">
            <img src="projectImages/'.$currentMeal[3].'" alt="nothing" >
          </br>
          <p>&#11088;'.number_format(($connection -> calculateRating($currentMeal[0])),2).' rating</p>
          <p ><b>'.$currentMeal[1].'</b> </p>
          <p>'.$currentMeal[4].'</p>
        </a>
          <div class="price">
            <button id="meal'.$currentMeal[0].'" type="button" class="mybutton" href="detail.php" > <a href="php/cart.php?id='.$currentMeal[0].'&back='.$_SERVER["PHP_SELF"].'" class="innerButton" style="text-decoration:none; color: black;">add to cart</a></button>
            <span>'.number_format(($currentMeal[2]),2).' SAR</span>
          </div>
          </div>
        </div> ');
      }
      echo('
    </div>
  </div>
</section>
    ');}
?>

    
<section>
  <div class="MenuHeader">
  <h3 id="Menu"> our most popular recipes</h3>
  <p >Try our most delicious food and usually takes minutes to deliver</p>
  </div>

  <div class="container">
    <div class="row">

    <?php 
    $currentMeals = $connection -> getAllMeals();
    for($i=0 ; $i < count($currentMeals); $i++){
          echo ('<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
          <div class="itemBorder">
            <a href="detail.php?id='.$currentMeals[$i][0].'">
            <img src="projectImages/'.$currentMeals[$i][3].'" alt="nothing" >
          </br>
          <p>&#11088;'.number_format(($connection -> calculateRating($currentMeals[$i][0])),2).' rating</p>
          <p ><b>'.$currentMeals[$i][1].'</b> </p>
          <p>'.$currentMeals[$i][4].'</p>
        </a>
          <div class="price">
            <button id="meal'.$currentMeals[$i][0].'" type="button" class="mybutton" href="detail.php" > <a href="php/cart.php?id='.$currentMeals[$i][0].'&back='.$_SERVER["PHP_SELF"].'" class="innerButton" style="text-decoration:none; color: black;">add to cart</a></button>
            <span>'.number_format(($currentMeals[$i][2]),2).' SAR</span>
          </div>
          </div>
        </div> ');
      }
    ?>

    </div>
  </div>
</section>

<section>
  <div class="Testimonials1">
  <h3  id="Testimonials">Clients Testimonials</h3>

    <div id="carouselExampleIndicators" class="carousel slide marg" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active "></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1" ></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2" ></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active"><div>
          <div class="container">
            <div class="row">
              <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
          <img class="img-fluid " src="projectImages/man-eating-burger.png" alt="First slide"> </div>
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <h6 class="sliderText">Lorem ipsum dolor sit amet consectetur adipisicing elit. Naque deserunt laborum, laboriosam
            veritatis quibusdam blanditiis dolor exercitatiomem velit commodi quae 
            assumenda incidunt voluptas.Corporis ex nulla repellendus ullam nihi!</h6></div>
          </div>
          </div>
            </div>
        </div>
        <div class="carousel-item"><div>
          <div class="container">
            <div class="row">
              <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
          <img class="img-fluid " src="projectImages/man-eating-burger.png" alt="Second slide"> </div>
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <h6 class="sliderText">Lorem ipsum dolor sit amet consectetur adipisicing elit. Naque deserunt laborum, laboriosam
            veritatis quibusdam blanditiis dolor exercitatiomem velit commodi quae 
            assumenda incidunt voluptas.Corporis ex nulla repellendus ullam nihi!</h6></div>
          </div>
          </div>
            </div>
        </div>
        <div class="carousel-item"><div>
          <div class="container">
            <div class="row">
              <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
          <img class="img-fluid " src="projectImages/man-eating-burger.png" alt="Third slide"> </div>
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <h6 class="sliderText">Lorem ipsum dolor sit amet consectetur adipisicing elit. Naque deserunt laborum, laboriosam
            veritatis quibusdam blanditiis dolor exercitatiomem velit commodi quae 
            assumenda incidunt voluptas.Corporis ex nulla repellendus ullam nihi!</h6></div>
          </div>
          </div>
            </div>
        </div>

        
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

  </div>
</section>

<?php
    include "include/inc.footer.php";
    ?>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
