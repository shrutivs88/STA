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
    var responseData = [];
    var limit = 10;
    var offset = 0;
    var isUpdateOffsetPristine = true;
    var countries = [];
    var states = [];
    var cities = [];


    $(document).ready(function() {
        preInitilizeLocationChainingEffectBeginByInitCountry();

        $("#ajaxButton").click(function() {
            loadByLimit();
        });

        $("#clientCountry").change(function() {
            var countryId = $("#clientCountry").val();
            $("#clientState").html("<option value=''>Select State</option>");
            if($("#clientCountry").val() != "") {
                loadStatesByCountryIdJson(countryId);
            }
            $("#clientCity").html("<option value=''>Select City</option>");
        });

        $("#clientState").change(function() {
            $("#clientCity").html("<option value=''>Select City</option>");
            if($("#clientState").val() != "") {
                loadCitiesByStateIdJson($("#clientState").val());
            }
        });

    });

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
                initStatesChainingEffect();
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
                initCitiesChainingEffect();
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
                loadByLimit();
            }
        });
    }
    /**
    On change activates
    */
    function loadStatesByCountryIdJson(countryId){
        $.ajax({
            type: "post",
            url: "locationDetails.php",
            data: {
                countryId: countryId,
                locationType: "state-all-by-country-id"
            },
            success: function(response) {
                var optionsStates = "<option value=''>Select State</option>";
                        for(var j=0; j<response.length; j++) {
                            optionsStates += "<option value='" + response[j].state_id + "'>";
                            optionsStates += response[j].state_name;
                            optionsStates += "</option>";
                        }
                        $("#clientState").html(optionsStates);
            }
        });
    }

    /**
    On change activates
    */
    function loadCitiesByStateIdJson(stateId) {
        $.ajax({
            type: "post",
            url: "locationDetails.php",
            data: {
                stateId: stateId,
                locationType: "city-all-by-state-id"
            },
            success: function(response) {
            
                var optionsCities = "<option value=''>Select City</option>";
                        for(var i=0; i<response.length; i++) {
                            optionsCities += "<option value='" + response[i].city_id + "'>";
                            optionsCities += response[i].city_name;
                            optionsCities += "</option>";
                        }
                        $("#clientCity").html(optionsCities);
            }
        });
    }

    function showEditClient(clientId) {
        $("#myModal").modal();
        data = "";
        $.each(responseData, function( key, value ) {
           if(value.client_contact_id == clientId) {
               data = value;
               setModalFields(data);
                return;
             }
        });
    }

    function setModalFields(data) {
        $("#clientId").val(data.client_contact_id);
        $("#clientFirstName").val(data.client_contact_first_name);
        $("#clientLastName").val(data.client_contact_last_name);
        $("#clientEmail").val(data.client_contact_email);
        $("#clientMobile").val(data.client_contact_mobile);
        $("#clientCategory").val(data.client_contact_category);
        $("#clientDesignation").val(data.client_contact_designation);
        $("#clientAddress").val(data.client_contact_address);
        $("#clientLinkedInId").val(data.client_contact_linkedin);
        $("#clientFacebookId").val(data.client_contact_facebook);
        $("#clientTwitterId").val(data.client_contact_twitter);
        $("#clientCompanyId").val(data.client_company_id);
        $("#clientDateTime").val(data.client_contact_added);
        loadCountriesJsonAndSetCountry(data);
        
    }

    function loadCountriesJsonAndSetCountry(data) {
        $.ajax({
            type: "post",
            url: "locationDetails.php",
            data: {
                locationType:"country-all"
            },
            success: function(response) {
                var optionsCountry = "<option value=''>Select Country</option>";
                        for(var i=0; i<response.data.length; i++) {
                            optionsCountry += "<option value='" + response.data[i].country_id + "'>";
                            optionsCountry += response.data[i].country_name;
                            optionsCountry += "</option>";
                        }
                        $("#clientCountry").html(optionsCountry);
                        $("#clientCountry").val(data.country_id);
                        if(data.country_id== 0) {
                            $("#clientCountry").val("");
                        }
                        loadStatesJsonAndSetState(data);
            }
        });
    }

    function loadStatesJsonAndSetState(data) {
        $.ajax({
            type: "post",
            url: "locationDetails.php",
            data: {
                country_id: data.country_id,
                locationType: "state-all-by-country-id"
            },
            success: function(response) {
                var optionsStates = "<option value=''>Select State</option>";
                        for(var j=0; j<response.length; j++) {
                            optionsStates += "<option value='" + response[j].state_id + "'>";
                            optionsStates += response[j].state_name;
                            optionsStates += "</option>";
                        }
                        $("#clientState").html(optionsStates);
                        $("#clientState").val(data.state_id);
                        if(data.state_id== 0) {
                            $("#clientState").val("");
                        }
                        loadCitiesJsonAndSetCity(data);
            }
        });
    }

    function loadCitiesJsonAndSetCity(data) {
        $.ajax({
            type: "post",
            url: "locationDetails.php",
            data: {
                state_id: data.state_id,
                locationType: "city-all-by-state-id"
            },
            success: function(response) {
                var optionsCities = "<option value=''>Select City</option>";
                        for(var i=0; i<response.length; i++) {
                            optionsCities += "<option value='" + response[i].city_id + "'>";
                            optionsCities += response[i].city_name;
                            optionsCities += "</option>";
                        }
                        $("#clientCity").html(optionsCities);
                        $("#clientCity").val(data.city_id);
                        if(data.city_id == 0) {
                            $("#clientCity").val("");
                        }
            }
        });
    }


    /**
    Backend call to save data */
    function updateClient(clientId) {
        $("#myModal").modal('toggle');
        $.ajax({
            type: "post",
            url: "bde_editclientcontact.php",
            data: {
                clientId: $("#clientId").val(),
                clientFirstName: $("#clientFirstName").val(),
                clientLastName: $("#clientLastName").val(),
                clientEmail: $("#clientEmail").val(),
                clientMobile: $("#clientMobile").val(),
                clientCategory: $("#clientCategory").val(),
                clientDesignation: $("#clientDesignation").val(),
                clientAddress: $("#clientAddress").val(),
                clientCountry: $("#clientCountry").val(),
                clientState: $("#clientState").val(),
                clientCity: $("#clientCity").val(),
                clientLinkedInId: $("#clientLinkedInId").val(),
                clientFacebookId: $("#clientFacebookId").val(),
                clientTwitterId: $("#clientTwitterId").val(),
                clientCompanyId: $("#clientCompanyId").val()
                //clientDateTime: $("#clientDateTime").val()
            
            },
            success: function(response) {
                window.location.reload();
            }
        });
    }

   /* function deleteClient(clientId) {
        $.ajax({
            type: "post",
            url: "deleteclientcontact.php",
            data: {
                clientId: clientId
            },
            success: function(response) {
                window.location.reload();
            }
        });
    }*/
    function showClientCompany(companyId) {
        //window.location.href="showCompany.php?companyId="+companyId;
        $("#myModalCompany").modal('toggle');
        $.ajax({
                type: "post",
                url:"bde_showcompany.php",
                data: {
                    companyId:companyId
                    
                },
                success: function(companyresult){
                    //console.log(companyresult);
                    //return;
                    $("#companyName").val(companyresult.companyName);
                    $("#companyWebsite").val(companyresult.companyWebsite);
                    $("#companyEmail").val(companyresult.companyEmail);
                    $("#companyPhone").val(companyresult.companyPhone);
                    $("#companyLinkedIn").val(companyresult.companyLinkedIn);
                    $("#companyAddress").val(companyresult.companyAddress);
                
                }
        });
    }

    var offset = 0;
    var limit = 4;
    var isUpdateOffsetPristine = true;
    var count =0;

function loadByLimit(){
    count++;
    $("#ajaxButton").prop("disabled", "true");
    $.ajax({
        type: "Post",
        url: "bde_clientdatabasepage.php",
        data: {
            limitVal: limit,
            offsetVal: offset,
        },
        success: function(data) {
            jQuery.each( data, function( index, value ) {
                responseData.push(jQuery.extend(true, {}, value));
            });
            if(data.length == 0 && isUpdateOffsetPristine == true) {
                $("#bde-list").html("<h4 class='text-center'>No Clients Are Available!</h4>");
                $("#ajaxButton").hide();
                return;
            } else if(data.length == 0 && isUpdateOffsetPristine == false) {
                $("#bde-list").append("<h4 class='text-center'>No More Clients Are Available!</h4>");
                $("#ajaxButton").hide();
                return;
            }
            var bdeListBuilder = "";
            if(data.length == 0) {
                $("#bde-list").html("<h4 class='text-center'>No Client Are Available!</h4>");
                return;
            }
            for(var i=0; i<data.length; i++) { 
                var bdeListBuilder = "";
                bdeListBuilder += "<tr>";

                //bdeListBuilder += "<td>" + data[i].clientId + "</td>";
               // bdeListBuilder += "<td>"+ parseInt(i+1) +"</td>";
                bdeListBuilder += "<td>"+ parseInt(count+i) +"</td>";
                bdeListBuilder += "<td>" + data[i].client_contact_first_name + "</td>";
                bdeListBuilder += "<td>" + data[i].client_contact_last_name + "</td>";
                bdeListBuilder += "<td>" + data[i].client_contact_email + "</td>";
                bdeListBuilder += "<td>" + data[i].client_contact_mobile + "</td>";
                bdeListBuilder += "<td>" + data[i].client_contact_category + "</td>";
                bdeListBuilder += "<td>" + data[i].client_contact_designation + "</td>";
                bdeListBuilder += "<td>" + data[i].client_contact_address + "</td>";
                var isCountrySet = false;
                jQuery.each( countries, function( index, value ) {
                    if(value.country_id == data[i].country_id) {
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
                    if(value.state_id == data[i].state_id) {
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
                    if(value.city_id == data[i].city_id) {
                        bdeListBuilder += "<td>" + value.city_name + "</td>";
                        isCitySet = true;
                        return;
                    }
                });
                if(!isCitySet) {
                    bdeListBuilder += "<td>-</td>";
                }
                bdeListBuilder += "<td>" + data[i].client_contact_linkedin  + "</td>";
                bdeListBuilder += "<td>" + data[i].client_contact_facebook + "</td>";
                bdeListBuilder += "<td>" + data[i].client_contact_twitter + "</td>";
                bdeListBuilder += "<td>" + data[i].client_contact_status + "</td>";
                bdeListBuilder += "<td>" + data[i].client_contact_added + "</td>";
                bdeListBuilder += "<td><button class='btn btn-primary action-btn' onclick='showEditClient(" + data[i].client_contact_id + ")'><span class='glyphicon glyphicon-edit'></span></button><button class='btn btn-green action-btn' onclick='showClientCompany(" + data[i].client_company_id + ")'><span class='glyphicon glyphicon-eye-open'></span></button></td>'";
                bdeListBuilder += "</tr>";
                $("#bde-list-table").append(bdeListBuilder);
            }
            offset += limit;
            isUpdateOffsetPristine = false;  
            count = count+limit-1;

            $("#ajaxButton").prop("disabled", ""); 
        }
    });        
}
</script>
</head>
<body>
    <?php include 'navbar.php';?>
    <div class="content-view">
        <div class="container-fluid">
            <!-- BDE Access Only -->
            <?php if ($_SESSION['role'] == "BDE") : ?>
                <div id="bde-container">
                    <h2 class="text-center">Client List</h2>
                    <div class="row">
                        <p id="clients" class="text-center" style="color:red;">
                            <?php
                            if(isset($_SESSION["server-msg"])) {
                                echo $_SESSION["server-msg"];
                                unset($_SESSION["server-msg"]);
                            }
                            ?>
                        </p>
                        <div id="bde-list" class="col-md-12 text-center">
                            <div style="overflow-x:auto;">
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
                                            <th>Status </th>
                                            <th>Date And Time </th>
                                            <th>Actions</th>
                                
                                        </tr>  
                                    </thead>
                                    <tbody  id="bde-list-table"></tbody>
                                </table> 
                            </div>                  
                        </div>
                    </div>
                    <div class="text-center" style="margin-top: 10px;">
                        <input type="button" class="btn btn-default" value="Click Here" id="ajaxButton"/>
                    </div>
                    <div id="result"></div>
                </div>
            <?php endif; ?>
        </div>     
    </div> 
    <?php include 'footer.php';?>
</body>
</html>
<p  data-toggle="modal" data-target="#myModal"></p>

<div id="myModal" class="modal fade"  class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header  text-center bg-primary">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Client Details</h4>
      </div>
      <div class="modal-body">
           
      <!-- modal body starts here -->
      <!-- input fields starts here -->
                        <input type="hidden" name="clientId" id="clientId">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label>First Name: </label>
                                                </div>
                                                <div class="col-sm-8">
                                                <input id="clientFirstName" name="clientFirstName" type="text" class="form-control" placeholder="Enter Your First Name">
                                                                       
                                                </div>
                                            </div>
                                        </div><!-- row end -->

                                        <div class="form-group">
                                            <div class="row">
                                                    <div class="col-sm-4">
                                                        <label>Last Name: </label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                    <input id="clientLastName" name="clientLastName" type="text" class="form-control" placeholder="Enter Your Last Name">
                                                                             
                                                    </div>
                                                </div>
                                        </div><!-- row end -->

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label>Email id: </label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input id="clientEmail" name="clientEmail" type="text" class="form-control" placeholder="Enter Your email-id"> 
                                                   
                                                </div>
                                            </div>
                                        </div><!-- row end -->

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label>Mobile No.: </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input id="clientMobile" name="clientMobile" type="text" class="form-control" placeholder="Enter Your contact number">
                                               
                                            </div>
                                        </div>
                                    </div><!-- row end -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>Category: </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input  id="clientCategory" name="clientCategory"   class="form-control">
                       
                                        </div>
                                    </div>
                                </div><!-- row end -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>Designation: </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input  id="clientDesignation" name="clientDesignation"  class="form-control">
                                               
                                    
                                        </div>
                                    </div>
                                </div><!-- row end -->
                                <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label>Address: </label>
                                    </div>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" placeholder="Enter your address here" name="clientAddress" id="clientAddress"></textarea>
                                        <i style="color:red" id="clientAddressError"></i>
                                    </div>
                                </div>
                            </div><!-- row end -->

                             <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label>Country: </label>
                                    </div>
                                    <div class="col-sm-8">
                                        <select id="clientCountry" name="clientCountry"  class="form-control">
                                        <option value="">Select Country</option>
                                        </select>
                                        
                                    </div>
                                </div>
                            </div><!-- row end -->
                            <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>State: </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <select id="clientState" name="clientState"  class="form-control">
                                                <option value="">Select States</option>
                                            </select>
                                            <i style="color:red" id="clientStateError"></i>
                                        </div>
                                    </div>
                                </div><!-- row end -->
                           
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>City: </label>
                                        </div>
                                        <div class="col-sm-8">
                                        <select id="clientCity" name="clientCity"  class="form-control">
                                                <option value="">Select City</option>
                                            </select>
                                            <i style="color:red" id="clientCityError"></i>
                                        </div>
                                    </div>
                                </div><!-- row end -->
                                
                           
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>LinkedIn Id: </label>
                                </div>
                                <div class="col-sm-8">
                                    <input  id="clientLinkedInId"  name="clientLinkedInId" type="text"  class="form-control" placeholder="Please Provide Linkedin id">
                                      
                                </div>
                            </div>
                        </div><!-- row end -->            

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Facebook Id: </label>
                                </div>
                                <div class="col-sm-8">
                                    <input id="clientFacebookId" name="clientFacebookId" type="text" class="form-control" placeholder="Please Provide facebook id">
                                   
                                </div>
                            </div>
                        </div><!-- row end -->    

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Twitter Id: </label>
                                </div>
                                    <div class="col-sm-8">
                                        <input id="clientTwitterId" name="clientTwitterId" type="text"  class="form-control" placeholder="Please Provide twitter id">
                   
                                    </div>
                            </div>
                        </div><!-- row end -->

                    <div class="form-group">
                        <div class="row text-center">
                            <input type="button" value="Update"  class="btn btn-success" onclick="updateClient()">
                            
                        </div>
                    </div><!-- row end -->
      <!-- input fields ends here -->
      <!-- modal body ends here -->
          
      </div>
      
    </div>

  </div>
</div>
<!--MODAL of COMPANY DETAILS -->
<p  data-toggle="modal" data-target="#myModalCompany"></p>
<div id="myModalCompany" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header  text-center  bg-primary">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Client Company Details</h4>
      </div>
      <div class="modal-body">
      <!-- modal body starts here -->
     <table class="table table-bordered"  >
                        <tr>
                        <th>Company Name : </th>
<td><input id="companyName" name="companyName" type="text" class="form-control" placeholder="Enter Company Name" readonly></td>
                        </tr>   
                        <tr>            
                        <th>Company Website: </th>
<td><input id="companyWebsite" name="companyWebsite" type="text" class="form-control" placeholder="Enter Website URL" readonly></td>
                          </tr>    
                          <tr>
                        <th>Company Email id: </th>
<td><input id="companyEmail" name="companyEmail" class="form-control" type="text" placeholder="Enter Company email-id" readonly></td>
                             </tr>    
                             <tr>
                        <th>Company Phone: </th>
<td><input id="companyPhone" name="companyPhone" type="text" class="form-control" placeholder="Enter Company phone number" readonly></td>
                                   </tr>  
                                   <tr>
                        <th>Company LinkedIN Id: </th>
<td><input id="companyLinkedIn" name="companyLinkedIn" type="text" class="form-control" placeholder="Company linked in id" readonly></td>
                                     </tr> 
                                     <tr>
                        <th>Company Address: </th>
<td><textarea  id="companyAddress" name="companyAddress" class="form-control" placeholder="Enter Comapny address here" readonly></textarea></td>
                          </tr>            
      <!-- modal body ends here -->
          
          </table>
      </div>
      
    </div>

  </div>
</div>



