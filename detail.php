<!DOCTYPE html>
<html>

<!--- the head-->
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="This is team 13's website">
	<title>Details Page</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styleDetail.css">
    <script type="text/javascript" src="app.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<!--- the body-->
<body>
 
<?php
    include "php/meals.php";
    include "include/inc.header.php";
    //include "php/review.php";
    if(isset($_GET["id"])){
      $PageID = $_GET["id"];}
    else{
      $PageID = 1;
    }
    require_once "php/meal_db.php";
    $connection = new Connection();
    $currentMeal = $connection -> getMealsById($PageID);
    ?>

	<main>

  <?php 
  echo('
  <script>
  function hid_fact(mealId){
    var factbutt = document.querySelector("#fact");
    var countanirr = document.querySelectorAll(".containerr");
    var facts = document.querySelector("#facts");
    var review = document.querySelector("#review");
    facts.style.display= "none";
    review.style.display= "block"; 
    document.getElementById("fact").style.backgroundColor = "transparent";
    document.getElementById("rev").style.backgroundColor = "#FFAA00";
    
    //DB
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("reviewsCont").innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET","php/review.php?func=0&id="+'.$PageID.',true);
  xmlhttp.send();
  }
  </script>


    <section id="Testimonials" class="topSec marg">
      <div>
      <img src="projectImages/'.$currentMeal[3].'" class="topPhoto"/>
      </div>
      <div class="testimonialsRight">
        <br/>
        <h1 >'.$currentMeal[1].'</h1>
        <p>'.number_format(($currentMeal[2]),2).' SAR</p>
        <span>&#11088;</span
        <p> '.number_format(($connection -> calculateRating($PageID)),2).' rating</p>

        <p>lorem ipsom dolor sitamet consectetur adisicing elit. Excepturi labore eos delectus, porro eveniet maiores repellendus! Iusto eos illo, nisi fugiat delectus nostrum harum aliquid rerum nobis tempora nulla sit.</p>
        <div class="amountButtons">
          <div class="amountButtonsLeft">
              <button type="button" onclick="decrementCart()">-</button>
              <button type="button" id="amountToAdd">1</button>
              <button type="button" onclick="incrementCart()">+</button>
          </div>
          <div class="amountButtonsRight">
              <button type="button" class="mybutton"> <a href="php/cart.php?id='.$currentMeal[0].'&back='.$_SERVER["PHP_SELF"].'" class="innerButton" style="text-decoration:none; color: black;">add to cart</a></button>
          </div>
        </div>
      </div>
    </section>
    
    <section class="description marg">
    <h2>description</h2>
    <p>'.$currentMeal[4].'</p>
    </section>


    <div class="containerr">
      <div style="margin-left: 150px;">
        <button id=fact class="mybutton"  onclick="hid_review()" >description</button>
      <button id=rev class="mybutton" onclick="hid_fact('.$currentMeal[0].')">Reviews</button>
      </div>


    <section id="facts" class="marg">
      <h4>nutrition facts</h4>
      <table>
        <tr><td colspan="3"> <b>Supplement Facts</b> </td></tr>
        <tr class="tableElem1"><td colspan="3" > <b>Serving Size:</b> '.$myMeals -> getMealById($PageID-1)["nutrition"]["serving_size"].'</td></tr>
        <tr><td colspan="3"> <b>Serving Per Container:</b> '.$myMeals -> getMealById($PageID-1)["nutrition"]["serving_per_container"].' </td></tr>
        <tr class="tableElem1"> <td></td>
          <td> <b>Amount Per Serving </b> </td>
          <td> <b>%Daily Value*</b> </td> </tr>

          ');
        for($i=0 ; $i < count($myMeals -> getMealById($PageID-1)["nutrition"]["facts"]); $i++){
          if($i%2 == 0){
          echo('
        <tr><td>'.$myMeals -> getMealById($PageID-1)["nutrition"]["facts"][$i]["item"].'</td>
          <td>'.$myMeals -> getMealById($PageID-1)["nutrition"]["facts"][$i]["amount_per_serving"]." ".$myMeals -> getMealById($PageID-1)["nutrition"]["facts"][$i]["unit"].'</td>
          <td>'.$myMeals -> getMealById($PageID-1)["nutrition"]["facts"][$i]["daily_value"].'</td></tr>
        ');}
        else{
          echo('
          <tr class="tableElem1"><td>'.$myMeals -> getMealById($PageID-1)["nutrition"]["facts"][$i]["item"].'</td>
            <td>'.$myMeals -> getMealById($PageID-1)["nutrition"]["facts"][$i]["amount_per_serving"]." ".$myMeals -> getMealById($PageID-1)["nutrition"]["facts"][$i]["unit"].'</td>
            <td>'.$myMeals -> getMealById($PageID-1)["nutrition"]["facts"][$i]["daily_value"].'</td></tr>
          ');
        }
      }

        echo('
        <tr> <td colspan="3">* Percent Daily Values are based on a 2,000 calorie diet. Your daily values may be higher or lower depending on your calorie needs</td></tr>                       
      </table>
    </section>


<section id="review" class="marg">
  <h3 class="reviewText">Reviews</h3>
    <div id="reviewsCont"> </div>
    </br>
    ' );
    echo'
      <h4> <button type="button" onclick="addReview()" class="mybutton">Add Your Review</button> </h4>

    
      <br>
      <form id="reviewForm" action="" method="post" class="ajax">
      <div class="ReviewVis">
      <label for="image">Image</label>
      <input type="file" name="image" id="image" >
      </br>
    <br>
    <div>
      <Label for="rate">Rate the food </Label>
      <input type="range" name="rate" id="rate" list="tickmarks">
      <datalist id="tickmarks">
        <option value="20"></option>
        <option value="40"></option>
        <option value="60"></option>
        <option value="80"></option>
        <option value="100" label="100%"></option>
    </datalist>
    </div>
    <br>
    <div>
      <label for="name">Name</label>
      <br>
      <input class="namebar" type="text" name="name" id="name" placeholder="First and Last name">
    </div>
    <br>
    <div>
    <label for="review">Review</label>
    <br>
    <div id="emptyErrorMessage">Please type your review</div>
<div>
  
    <textarea onkeyup="counter()" class="revbar" name="review" id="revbar" cols="30" rows="10"  maxlength="500" placeholder=" Type your review here max 500 characters"></textarea>
    <div id="the-count">
      <span id="span">0</span>
      <span id="maximum">/ 500</span>
    </div>
  </div>
    <br>
    <div>

    <script>

    function submitRev(){
        $.ajax({
        url: "php/review.php", 
        type: "POST",
        data: $("reviewForm").serialize(),
        meal_id:'.$PageID.',
        success: function(result, status){
        } });
    }
          </script>


      <button class="submitButton" type="button" onClick="submitRev()" id="sbmt">submit</button>
      
      </div>
    </div>
  </form>
  <br>
</section>

';

    include "include/inc.footer.php";
    ?>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
