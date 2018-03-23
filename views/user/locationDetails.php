<?php
session_start();
include '../../utility/DatabaseManager.php';
$data = new DatabaseManager();
$conn = $data->getconnection();

$locationType = $_POST["locationType"];

if($locationType == "country-all") {
    $listOfCountries = array();
    $sql = "select * from countries";
    $res = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($res)){
        array_push($listOfCountries, $row);
    }
    header('Content-Type: application/json');
    echo json_encode($listOfCountries);
    exit();
}

if($locationType == "state-all-by-country-id") {
    $listOfStatesByCountryId = array(); 
    $countryId = $_POST["countryId"];
    $state_sql = "select * from states where country_id='$countryId'";
    $res = mysqli_query($conn,$state_sql);
    while($row = mysqli_fetch_assoc($res)){
         array_push($listOfStatesByCountryId, $row);
    }
    header('Content-Type: application/json');
    echo json_encode($listOfStatesByCountryId);
    exit();
}

if($locationType == "city-all-by-state-id") {
    $listOfCityByStateId = array(); 
    $stateId = $_POST["stateId"];
    $city_sql = "select * from cities where state_id='$stateId'";
    $res = mysqli_query($conn,$city_sql);
    while($row = mysqli_fetch_assoc($res)){
        array_push($listOfCityByStateId, $row);
   }
    header('Content-Type: application/json');
    echo json_encode($listOfCityByStateId);
    exit();
}
?>