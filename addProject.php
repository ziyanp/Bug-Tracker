<?php  

    session_start();

    $conn = mysqli_connect('localhost','ziyan', 'test1234', 'bugbyte projects');

    if(!$conn) {
        echo 'Connection Error: '.mysqli_connect_error();
    }


    $name = $description = $id=$developers='';
    $errors = array('name'=>'', 'description'=>'');


    if(isset($_POST['addProject'])){
        

      if(empty($_POST['name'])) {
        $errors['name'] = 'A project name is required <br />';   // change these errors to appear on the form (red outline?)
        echo 'name error';

      }
      else {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $developers = $_POST['developers'];
        

      }


      if(array_filter($errors)) {
          echo 'errors';

      } else {

        $name = mysqli_real_escape_string($conn, $_POST['name']); //realescapestring prevents harmful code being inserted into database
        $description = mysqli_real_escape_string($conn, $_POST['description']);

        $developers = serialize($_POST['developers']);
       
        //$developers = mysqli_real_escape_string($array);
        $created_by = $_SESSION['username'];



        //create sql
        $sql = "INSERT INTO projects(name, description, created_by, developers) VALUES('$name', '$description','$created_by', '$developers')";

        //save to database and check
        if(mysqli_query($conn, $sql)) {

          //success
          header('Location: projects.php');


        } else {
          echo 'query error: ' . mysqli_error($conn);
        }

      }

    }

    mysqli_close($conn);

?>