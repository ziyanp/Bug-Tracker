<?php
header('Content-Type: application/json');

require_once('dbh.inc.php');
session_start();

$sql = "SELECT developer,created_by, priority, status FROM tickets";

$result = mysqli_query($conn,$sql);
$tickets = mysqli_fetch_all($result, MYSQLI_ASSOC);

$data = array();
$lowCount = 0;
$medCount = 0;
$highCount = 0;
foreach ($tickets as $ticket) {

    if($ticket['status'] != 'Complete' && ($ticket['developer'] == $_SESSION['username'] || $ticket['created_by']==$_SESSION['username']))
    {
    
	if($ticket['priority'] == "LOW"){
        $lowCount++;
    }
    else if($ticket['priority'] == "MEDIUM"){
        $medCount++;
    }
    else if($ticket['priority'] == "HIGH") {
        $highCount++;
    }
    }
    
   // $data[] = $row;
}


array_push($data, $lowCount, $medCount, $highCount);

//mysqli_free_result($result);

mysqli_close($conn);

echo json_encode($data);
?>