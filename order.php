<?php
setcookie("recent-bought", $_COOKIE["cart"],time()+30*24*60*60,"/");
setcookie("cart", "",time()-30*24*60*60,"/");
header("Location: index.php");
?>