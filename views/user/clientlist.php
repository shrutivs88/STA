<?php
session_start();
include '../../config.php';
if(!isset($_SESSION["email"])) {
    header("Location:login.php");
}
?>`
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
    var responseData = "";
    var limit = 10
    var offset = 0;
    var isUpdateOffsetPristine = true;

    $(document).ready(function() {
        loadByLimit();
        $("#ajaxButton").click(function() {
            loadByLimit();
        });

        $("#clientCountry").change(function() {
            var countryId = $("#clientCountry").val();
            loadStatesByCountryIdJson(countryId);
            //loadCitiesByStateIdJson($("#clientState").val());
            //loadStatesByCountryIdJson($("#clientCountry").val());
             
            //filter states by country id and store it in states array
            
            //populate states array into state select element on dom

        });

        $("#clientState").change(function() {
            loadCitiesByStateIdJson($("#clientState").val());
        });


        
    });
    function loadCountriesJson() {
    $.ajax({
        type: "post",
        url: "locationDetails.php",
        data: {
            locationType:"country-all"
        },
        success: function(response) {
           // console.log(response.locationType);
          //  return;
            var optionsCountry = "<option value=''>Select Country</option>";
                    for(var i=0; i<response.length; i++) {
                        optionsCountry += "<option value='" + response[i].country_id + "'>";
                        optionsCountry += response[i].country_name;
                        optionsCountry += "</option>";
                    }
                    $("#clientCountry").html(optionsCountry);
        }
    });
}

function loadStatesByCountryIdJson(countryId){
    $.ajax({
        type: "post",
        url: "locationDetails.php",
        data: {
            countryId: countryId,
            locationType: "state-all-by-country-id"
        },
        success: function(response) {
            var optionsStates = "<option value=''>Select States</option>";
                    for(var j=0; j<response.length; j++) {
                        optionsStates += "<option value='" + response[j].state_id + "'>";
                        optionsStates += response[j].state_name;
                        optionsStates += "</option>";
                    }
                    $("#clientState").html(optionsStates);
        }
    });
}

function loadCitiesByStateIdJson(stateId) {
    $.ajax({
        type: "post",
        url: "locationDetails.php",
        data: {
            stateId: stateId,
            locationType: "city-all-by-state-id"
        },
        success: function(response) {
           // console.log(response.locationType);
           // return;
            var optionsCities = "<option value=''>Select Cities</option>";
                    for(var i=0; i<response.length; i++) {
                        optionsCities += "<option value='" + response[i].city_id + "'>";
                        optionsCities += response[i].city_name;
                        optionsCities += "</option>";
                    }
                    $("#clientCity").html(optionsCities);
        }
    });
}

function setModalFields(data) {
    $("#clientId").val(data.clientId);
    $("#clientFirstName").val(data.clientFirstName);
    $("#clientLastName").val(data.clientLastName);
    $("#clientEmail").val(data.clientEmail);
    $("#clientMobile").val(data.clientMobile);
    $("#clientCategory").val(data.clientCategory);
    $("#clientDesignation").val(data.clientDesignation);
    $("#clientAddress").val(data.clientAddress);
    $("#clientCity").val(data.clientCity);
    $("#clientState").val(data.clientState);
    $("#clientCountry").val(data.clientCountry);
    $("#clientLinkedInId").val(data.clientLinkedInId);
    $("#clientFacebookId").val(data.clientFacebookId);
    $("#clientTwitterId").val(data.clientTwitterId);
    $("#clientCompanyId").val(data.clientCompanyId);
    $("#clientDateTime").val(data.clientDateTime);
}

function showEditClient(clientId) {
    $("#myModal").modal();
    loadCountriesJson();
    data = "";
    $.each(responseData, function( key, value ) {
        if(value.clientId == clientId) {
            data = value;
            setModalFields(data);
            return;
        }
    });
    
}

function updateClient(clientId) {
    $("#myModal").modal('toggle');
    $.ajax({
        type: "post",
        url: "editclientcontact.php",
        data: {
            clientId: $("#clientId").val(),
            clientFirstName: $("#clientFirstName").val(),
            clientLastName: $("#clientLastName").val(),
            clientEmail: $("#clientEmail").val(),
            clientMobile: $("#clientMobile").val(),
            clientCategory: $("#clientCategory").val(),
            clientDesignation: $("#clientDesignation").val(),
            clientAddress: $("#clientAddress").val(),
            clientCity: $("#clientCity").val(),
            clientState: $("#clientState").val(),
            clientCountry: $("#clientCountry").val(),
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

function deleteClient(clientId) {
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
}

function loadByLimit(){
    $.ajax({
              type: "Post",
              url: "clientdatabasepage.php",
              data: {
            limitVal: limit,
            offsetVal: offset,
                 },
              success: function(data) {
                responseData = data;
                   //alert(data);
              //  console.log(data);
                //  $v = json_decode(data);
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
          var status = false;
          
          for(var i=0; i<data.length; i++) { 

                        var bdeListBuilder = "";
                        bdeListBuilder += "<tr>";

                        bdeListBuilder += "<td>" + data[i].clientId + "</td>";
                        bdeListBuilder += "<td>" + data[i].clientFirstName + "</td>";
                        bdeListBuilder += "<td>" + data[i].clientLastName + "</td>";
                        bdeListBuilder += "<td>" + data[i].clientEmail + "</td>";
                        bdeListBuilder += "<td>" + data[i].clientMobile + "</td>";
                        bdeListBuilder += "<td>" + data[i].clientCategory + "</td>";
                        bdeListBuilder += "<td>" + data[i].clientDesignation + "</td>";
                        bdeListBuilder += "<td>" + data[i].clientAddress + "</td>";
                        bdeListBuilder += "<td>" + data[i].clientCountry + "</td>";
                        bdeListBuilder += "<td>" + data[i].clientState + "</td>";
                        bdeListBuilder += "<td>" + data[i].clientCity + "</td>";
                        bdeListBuilder += "<td>" + data[i].clientLinkedInId + "</td>";
                        bdeListBuilder += "<td>" + data[i].clientFacebookId + "</td>";
                        bdeListBuilder += "<td>" + data[i].clientTwitterId + "</td>";
                        bdeListBuilder += "<td>" + data[i].clientCompanyId + "</td>";
                        bdeListBuilder += "<td>" + data[i].clientStatus + "</td>";
                        bdeListBuilder += "<td>" + data[i].clientDateTime + "</td>";
                        bdeListBuilder += "<td><button class='btn btn-info action-btn' onclick='showEditClient(" + data[i].clientId + ")'><span class='glyphicon glyphicon-edit'></span></button></td>'";
                        bdeListBuilder += "</tr>";
                        $("#bde-list-table").append(bdeListBuilder);
                    }
                  
                    offset += limit;
                    isUpdateOffsetPristine = false;
                    
              }
        }); 

        
}
   </script>
</head>
<body>
    <?php include 'navbar.php';?>
    <div class="content-view">
        <div class="container-fluid">
            <!-- Admin Access Only -->
            <?php if ($_SESSION['role'] == "ADMIN") : ?>
                <div id="admin-container">
                    <h2 class="text-center">Admin</h2>
                </div>
            <?php endif; ?>
            <!-- BDM Access Only -->
            <?php if ($_SESSION['role'] == "BDM") : ?>
                <div id="bdm-container">
                    <h2 class="text-center">BDM</h2>
                </div>
            <?php endif; ?>
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
                        
                             <div  id="bde-list" class="col-md-12">
                                <div style="overflow-x:auto;">
                       <table class="table table-bordered text-center">
                       <thead class="sta-app-horizontal-table-thead">
                            <tr>
                                 <th>ID </th>
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
                                <th>Comapny Id </th>
                                <th>Status </th>
                                <th>Date And Time </th>
                                <th> Actions </th>

                                
                            </tr>  </thead>
                           <tbody  id="bde-list-table">
                                  
                              </tbody>
                            </table> 
                              
                    </div>
                                
        </div><!-- row end --> 

   
   <input type="button" class="btn btn-primary" value="Click Here" id="ajaxButton"/>
        <div id="result"></div>
            <?php endif; ?>
           </div>     
        </div> 
    </div>
 </div>
          
        
       
    <?php include 'footer.php';?>
    
</body>
</html>
<p  data-toggle="modal" data-target="#myModal"></p>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
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
                            <input  type="reset" value="Reset"  class="btn btn-danger">  
                        </div>
                    </div><!-- row end -->
      <!-- input fields ends here -->
      <!-- modal body ends here -->
          
      </div>
      
    </div>

  </div>
</div>



