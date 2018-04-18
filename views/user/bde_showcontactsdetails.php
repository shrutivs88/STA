<?php
session_start();
include '../../config.php';
if(!isset($_SESSION["email"])) {
    header("Location:login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sales Team Application</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo BASEURL; ?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo BASEURL; ?>assets/css/styles.css" />
    <script src="<?php echo BASEURL; ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo BASEURL; ?>assets/js/bootstrap.min.js"></script>
    <script>
 
        var countries=[];
        var states=[];
        var cities=[];
        var count =0;
        var offset = 0;
        var limit = 4;
  
    $(document).ready(function() {
        count++
        preInitilizeLocationChainingEffectBeginByInitCountry();
        initStatesChainingEffect();
        initCitiesChainingEffect();
        $.ajax({
            type: "Post",
            url: "bde_showcontacts.php",
            data: {
                companyId:<?php echo $_GET["companyId"] ?>
            },
            success:function(response) {
               //console.log(response);
                for(var i=0; i<response.length; i++) { 
                        var bdeListBuilder = "";
                        bdeListBuilder += "<tr>";
                        bdeListBuilder += "<td>"+ parseInt(count+i) +"</td>";
                        bdeListBuilder += "<td>" + response[i].client_contact_first_name + "</td>";
                        bdeListBuilder += "<td>" + response[i].client_contact_last_name + "</td>";
                        bdeListBuilder += "<td>" + response[i].client_contact_email + "</td>";
                        bdeListBuilder += "<td>" + response[i].client_contact_mobile + "</td>";
                        bdeListBuilder += "<td>" + response[i].client_contact_category + "</td>";
                        bdeListBuilder += "<td>" + response[i].client_contact_designation + "</td>";
                        bdeListBuilder += "<td>" + response[i].client_contact_address + "</td>";
                        var isCountrySet = false;
                        jQuery.each( countries, function( index, value ) {
                        if(value.country_id == response[i].country_id) {
                        bdeListBuilder += "<td>" + value.country_name + "</td>";
                        isCountrySet = true;
                        return;
                            }
                        });
                        if(!isCountrySet) {
                        bdeListBuilder += "<td>-</td>";
                        }
                        var isStateSet = false;
                        jQuery.each( states, function( index, value ) {
                        if(value.state_id == response[i].state_id) {
                        bdeListBuilder += "<td>" + value.state_name + "</td>";
                        isStateSet = true;
                        return;
                            }
                        });
                        if(!isStateSet) {
                        bdeListBuilder += "<td>-</td>";
                        }
                        var isCitySet = false;
                        jQuery.each( cities, function( index, value ) {
                        if(value.city_id == response[i].city_id) {
                        bdeListBuilder += "<td>" + value.city_name + "</td>";
                        isCitySet = true;
                        return;
                            }
                        });
                        if(!isCitySet) {
                        bdeListBuilder += "<td>-</td>";
                        }
                        bdeListBuilder += "<td>" + response[i].client_contact_linkedin + "</td>";
                        bdeListBuilder += "<td>" + response[i].client_contact_facebook + "</td>";
                        bdeListBuilder += "<td>" + response[i].client_contact_twitter + "</td>";
                        bdeListBuilder += "</tr>";
                        $("#bde-list-table").append(bdeListBuilder);
                    } 
                    offset += limit;
                    count = count+limit-1;
                }
            });
        });

          //fetching country , state , city
    function preInitilizeLocationChainingEffectBeginByInitCountry() {
        /**Loading all countries */
        $.ajax({
            type: "post",
            url: "locationDetails.php",
            data: {
                locationType:"country-all"
            },
            success: function(response) {
                countries = response.data;
                //initStatesChainingEffect();
            }
        });
    }

    function initStatesChainingEffect() {
        $.ajax({
            type: "post",
            url: "locationDetails.php",
            data: {
                locationType:"state-all"
            },
            success: function(response) {
                states = response.data;
                //initCitiesChainingEffect();
            }
        });
    }

    function initCitiesChainingEffect() {
        $.ajax({
            type: "post",
            url: "locationDetails.php",
            data: {
                locationType:"city-all"
            },
            success: function(response) {
                cities = response.data;
            }
        });
    }  

       
    history.pushState(null, null, location.href);
    window.onpopstate = function () {
        history.go(1);
    };        
    </script>
</head>
<body>
    <?php include 'navbar.php';?>
    <div class="content-view">
        <div class="container-fluid">
            <!-- BDE Access Only -->
            <?php if ($_SESSION['role'] == "BDE") : ?>
                <div id="bde-container">
                    <h2 class="text-center"> Contacts List</h2>
                         <!--here the contact list will start showing-->
                       <a href="bde_companyclientlist.php"><button class="btn btn-primary" type="button"><span class="glyphicon glyphicon-chevron-left"></span>Go Back </button></a>
                       <br><br>
                            <div id="bde-list" class="col-sm-12">
                                <table class="table table-bordered text-center">
                                    <thead class="sta-app-horizontal-table-thead">
                                        <tr bgcolor="lightgray">
                                            <th>Sl No. </th>
                                            <th>First Name </th>
                                            <th>Last Name </th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Category</th>
                                            <th>Designation</th>
                                            <th>Address </th>
                                            <th>Country</th>
                                            <th>State </th>
                                            <th>City </th>
                                            <th>LinkedIn Id </th>
                                            <th>Facebook Id </th>
                                            <th>Twitter Id </th>
                                        </tr>  
                                    </thead>
                                    <tbody  id="bde-list-table"></tbody>
                                </table> 
                            </div>    
                       
                </div>
            <?php endif; ?>
        </div> 
    </div>
    <?php include 'footer.php';?>
</body>
</html>