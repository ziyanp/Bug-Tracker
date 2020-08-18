<?php 

$conn = mysqli_connect('localhost','ziyan', 'test1234', 'bugbyte projects');

if(!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}


?>