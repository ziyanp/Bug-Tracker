<?php  

    $conn = mysqli_connect('localhost','ziyan', 'test1234', 'bugbyte projects');

    if(!$conn) {
        echo 'Connection Error: '.mysqli_connect_error();
    }


    $name = $description = $id='';
    $errors = array('name'=>'', 'description'=>'');


    if(isset($_POST['addProject'])){
        

      if(empty($_POST['name'])) {
        $errors['name'] = 'A project name is required <br />';
        echo 'name error';

      }
      else {
        $name = $_POST['name'];
        $description = $_POST['description'];
        echo 'set';

      }


      if(array_filter($errors)) {
          echo 'errors';

      } else {

        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);


        //create sql
        $sql = "INSERT INTO projects(name, description) VALUES('$name', '$description')";

        //save to database and check
        if(mysqli_query($conn, $sql)) {

          //success
          header('Location: projects.php');


        } else {
          echo 'query error: ' . mysqli_error($conn);
        }

      }

    }

?>