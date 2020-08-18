<?php 

    require 'dbh.inc.php';

    if(isset($_POST['deleteTicket'])) //if delete button has been pressed
    {
        $id_to_delete = mysqli_real_escape_string($conn,$_POST['id_to_delete']);

        $sql = "DELETE FROM tickets WHERE id = $id_to_delete";

        if(mysqli_query($conn, $sql))
        {
            header('Location: tickets.php');
        }
        else {
            echo 'query error: ' . mysqli_error($conn);
          }

    }

    if(isset($_POST['completeTicket'])) 
    {
        $id_to_delete = mysqli_real_escape_string($conn,$_POST['id_to_delete']);

        //$status = mysqli_real_escape_string($conn, $_POST['status']);

        $sql = "UPDATE tickets SET status = 'Complete' WHERE id=$id_to_delete";

        if(mysqli_query($conn, $sql))
        {
            header('Location: tickets.php');
        }
        else {
            echo 'query error: ' . mysqli_error($conn);
          }

    }


?>