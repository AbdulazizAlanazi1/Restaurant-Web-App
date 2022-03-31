<?php
if(isset($_GET['func']) ){
    getReviews();
}
else if(isset($_POST['name'])){
    sendReview();
}

function getReviews(){
$id = intval($_GET['id']);

$con = mysqli_connect('localhost','root','','meals');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"meals");
$sql="SELECT * FROM reviews WHERE meal_id = ".$id."";
$result = mysqli_query($con,$sql);

$numOfRev = mysqli_num_rows($result);
if( $numOfRev == 0 ){
    echo"No Reviews";
}
else{
    echo'    
    <div id="carouselExampleIndicators" class="carousel slide marg" data-ride="carousel">
    <ol class="carousel-indicators">      
';
for($i=0;$i<$numOfRev;$i++){
    if($i == 0){
    echo'   
    <li data-target="#carouselExampleIndicators" data-slide-to="'.$i.'" class="active "></li>
';}
else{
echo'   
<li data-target="#carouselExampleIndicators" data-slide-to="'.$i.'" ></li>
';}

}
    echo'
    </ol>
    <div class="carousel-inner">
          ';
            $counter=0;
            while($row = mysqli_fetch_array($result)) {
                //echo "<td>" . $row['Job'] . "</td>";
                if($counter == 0){
                    echo'        
                    <div class="carousel-item active"><div>
                    <div class="container">
                      <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <img class="img-fluid " src="projectImages/man-eating-burger.png" alt="First slide"> </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                    <h4>'.$row['reviewer_name'].'</h4>
                    <span> <h5 style="display: inline">'.$row['city'].' - '.$row['date'].'</h5>';
                    for($n=0; $n < $row['rating']; $n++){
                      echo(' &#11088;');
                    }
                    echo('
                    </span>
                    <p>'.$row['review'].'
                    </p>
                

                    </div>
                    </div>
                    </div>
                      </div>
                  </div>
          ');
                }
                else{
                    echo'
                    <div class="carousel-item"><div>
                    <div class="container">
                      <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <img class="img-fluid " src="projectImages/man-eating-burger.png" alt="Second slide"> </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                    <h4>'.$row['reviewer_name'].'</h4>
                    <span> <h5 style="display: inline">'.$row['city'].' - '.$row['date'].'</h5>';
                    for($n=0; $n < $row['rating']; $n++){
                      echo(' &#11088;');
                    }
                    echo'
                    </span>
                    <p>'.$row['review'].'
                    </p>


                    </div>
                    </div>
                    </div>
                      </div>
                  </div>          
                    ';
                }    
                $counter++;
            }
echo'      
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
';}

mysqli_close($con);
        }

        function sendReview(){
            //$query = "INSERT INTO reviews(id,reviewer_name,city,date,rating,image,review,meal_id) VALUES (null,"'.$_POST['name'].'","","","'.$_POST['rate'].'",'.$_POST['image'].',"'.$_POST['review'].'","'.$_POST['meal_id'].'")";
            $statement = $this -> pdo -> prepare($query);
            $statement -> execute();
        }

?>