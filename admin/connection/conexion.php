<?php

$conn= new mysqli("localhost","root","","sistema_libros");
if(mysqli_connect_error()){
    echo "conection failed";
}else{
    return $conn;
}

?>