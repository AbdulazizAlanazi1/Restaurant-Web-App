<?php

if(isset($_GET["id"])){
    $id = $_GET['id'];
    $back = $_GET ['back']."?id=".$id;
    if(isset($_COOKIE["cart"])){
        $_COOKIE["cart"] = $_COOKIE["cart"].",".$id;
        setcookie("cart", $_COOKIE["cart"],time()+30*24*60*60,"/");
}else{
    setcookie("cart", $id,time()+30*24*60*60,"/");
}
    header("Location: $back");
}

?>