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

    $response = new stdClass();
    $response->locationType = "country-all";
    $response->data = $listOfCountries;

    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}

if($locationType == "state-all") {
    $listOfStates = array(); 
    $state_sql = "select * from states";
    $res = mysqli_query($conn,$state_sql);
    while($row = mysqli_fetch_assoc($res)){
         array_push($listOfStates, $row);
    }

    $response = new stdClass();
    $response->locationType = "state-all";
    $response->data = $listOfStates;

    header('Content-Type: application/json');
    echo json_encode($response);
    
    exit();
}

if($locationType == "city-all") {
    $listOfCity = array(); 
    $city_sql = "select * from cities";
    $res = mysqli_query($conn,$city_sql);
    while($row = mysqli_fetch_assoc($res)){
        array_push($listOfCity, $row);
   }

    $response = new stdClass();
    $response->locationType = "city-all";
    $response->data = $listOfCity;

    header('Content-Type: application/json');
    echo json_encode($response);
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