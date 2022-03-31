<?php

class Connection{
    private PDO $pdo;

    public function __construct(){
        $this -> pdo = new PDO("mysql:server=localhost;dbname=meals","root","");
    }

    public function getAllMeals(){
        $query = "SELECT * FROM meal;";
        $statement = $this -> pdo -> prepare($query);
        $statement -> execute();
        return $statement -> fetchAll();
    }
    
    public function getMealsById($id){
        $query = "SELECT * FROM meal WHERE id=".$id.";";
        $statement = $this -> pdo -> prepare($query);
        $statement -> execute();
        return $statement -> fetch();
    }

    public function getMealReviews($id){
        if(isset($_GET['id'])){
            $id = $_GET['id'];}
        
        $query = "SELECT * FROM reviews WHERE meal_id=".$id.";";
        $statement = $this -> pdo -> prepare($query);
        $statement -> execute();
        $statement -> fetchAll();
        return json_encode($statement);
    }

    public function addMealReview($id){}

    public function calculateRating($id){
        $review = 0;
        $query = "SELECT rating FROM reviews WHERE meal_id=".$id.";";
        $statement = $this -> pdo -> prepare($query);
        $statement -> execute();
        $count=0;
        while($result = $statement->fetch()){
            $review = $review + $result[0];
            $count++;
        }
        if($count == 0)
            return 0;
        else
            return $review/$count;
    }
}

$connection= mysqli_connect("localhost", "root", "", "meals");
    $error = mysqli_connect_error();
    if($error != null)
      echo"Error: could not connect to database";
?>