<?php  

require 'dbh.inc.php';
session_start();


    $title = $project = $id= $priority = $type = $developer = $description='';
    $errors = array('title'=>'', 'description'=>'');


    if(isset($_POST['addTicket'])){
        


      if(array_filter($errors)) {
          echo 'errors';

      } else {

        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $priority = mysqli_real_escape_string($conn, $_POST['priority']);
        $project = mysqli_real_escape_string($conn, $_POST['project']);
        $type = mysqli_real_escape_string($conn, $_POST['type']);
        $developer = mysqli_real_escape_string($conn, $_POST['developer']);
        $created_by = $_SESSION['username'];


        //create sql
        $sql = "INSERT INTO tickets(title,project,priority,type,developer,description,created_by) VALUES('$title','$project','$priority','$type','$developer','$description', '$created_by')";

        //save to database and check
        if(mysqli_query($conn, $sql)) {

          //success
          header('Location: tickets.php');


        } else {
          echo 'query error: ' . mysqli_error($conn);
        }

      }

    }

?>