<?php 

$conn = mysqli_connect('localhost','ziyan','test1234','bugbyte projects');

if(!$conn)
{
    echo 'Connection Error: ' . mysqli_connect_error();
}

if(isset($_POST['saveTicket']))
{
    $id_to_edit = mysqli_real_escape_string($conn, $_POST['id_to_edit']);

    $title = mysqli_real_escape_string($conn,$_POST['title']);
    $project = mysqli_real_escape_string($conn,$_POST['project']);
    $priority = mysqli_real_escape_string($conn,$_POST['priority']);
    $description = mysqli_real_escape_string($conn,$_POST['description']);
    $developer = mysqli_real_escape_string($conn,$_POST['developer']);
    $type = mysqli_real_escape_string($conn,$_POST['type']);

    $sql = "UPDATE tickets SET title = '$title', description = '$description', project='$project', priority='$priority', developer='$developer', type='$type' WHERE id =  $id_to_edit"; //must have single quotes around VARCHARS in queries

            //save to database and check
    if(mysqli_query($conn, $sql)) {

                //success
        header('Location: tickets.php');
      
      
    } else {
        echo 'query error: ' . mysqli_error($conn);
    }
}


    mysqli_close($conn);
?>