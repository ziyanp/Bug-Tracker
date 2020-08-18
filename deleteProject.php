<?php 

    $conn = mysqli_connect('localhost','ziyan','test1234','bugbyte projects');

    if(!$conn)
    {
        echo 'Connection Error: ' . mysqli_connect_error();
    }

    if(isset($_POST['deleteProject'])) //if delete button has been pressed
    {
        $id_to_delete = mysqli_real_escape_string($conn,$_POST['id_to_delete']);

        $sql = "DELETE FROM projects WHERE id = $id_to_delete";

        if(mysqli_query($conn, $sql))
        {
            header('Location: projects.php');
        }
        else {
            echo 'query error: ' . mysqli_error($conn);
          }

    }


?>