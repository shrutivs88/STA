<?php
include '../../utility/DatabaseManager.php';
$data = new DatabaseManager();
$conn = $data->getconnection();

$limit = $_POST["limitVal"];
$offset = $_POST["offsetVal"];

$sql = "SELECT * FROM client_details LIMIT $limit OFFSET $offset";

$result = mysqli_query($conn,$sql);
 //var_dump($result);
 //die;
$rows = array();
while($res = mysqli_fetch_assoc($result)){
    $rows[] = $res;
   
}
header('Content-Type: application/json');
echo json_encode($rows);
 
?>
