<?php 

$conn = mysqli_connect('localhost','ziyan','test1234','bugbyte projects');

if(!$conn)
{
    echo 'Connection Error: ' . mysqli_connect_error();
}

if(isset($_POST['saveProject']))
{
    $id_to_edit = mysqli_real_escape_string($conn, $_POST['id_to_edit']);
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $description = mysqli_real_escape_string($conn,$_POST['description']);
    $developers = serialize($_POST['developers']);

    $sql = "UPDATE projects SET name = '$name', description = '$description', developers ='$developers' WHERE id =  $id_to_edit"; //must have single quotes around VARCHARS in queries

            //save to database and check
    if(mysqli_query($conn, $sql)) {

                //success
        header('Location: projects.php');
      
      
    } else {
        echo 'query error: ' . mysqli_error($conn);
    }
}


    mysqli_close($conn);
?>