<div class="content">
        <div class="container-fluid">
          <div class="row">
               <div class="col-md-12">
              <form id="RangeValidation" class="form-horizontal" action="<?= base_url('sub-admin-add-driver');?>" method="post" enctype="multipart/form-data">
                <div class="card ">
                  <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                      <h4 class="card-title">Add Driver</h4>
                    </div>
                  </div>
                  <div class="card-body">

       <!--********************** driver personal details ***************************************** -->
                   <div class="row">
                     <label class="col-sm-4 col-form-label"> </label>
                       <div class="col-sm-7">
                         <h2><u>Driver Personal Details</u></h2>
                       </div>
                    </div>

                    <div class="row">
                      <label class="col-sm-2 col-form-label">First Name <span class="error_msg">*</span> </label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <input class="form-control" type="text" name="firstName"  required="required"  value="<?= set_value('namefirstName');?>"/>
                           <span class="error_msg"><?php echo form_error('firstName'); ?></span>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <label class="col-sm-2 col-form-label">Last Name  </label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <input class="form-control" type="text" name="lastName"  value="<?= set_value('lastName');?>"/>
                           <span class="error_msg"><?php echo form_error('lastName'); ?></span>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <label class="col-sm-2 col-form-label">D.O.B <span class="error_msg">*</span> </label>
                      <div class="col-sm-7">
                        <div class="row form-group form-md-line-input form-md-floating-label">
                             <input type="text" class="form-control" value="<?php echo set_value('dob'); ?>" autocomplete="off" name="dob" id="dt1"  required>
                            <span class="error_msg"><?php echo form_error('dob'); ?></span>
                        </div>
                      </div>
                    </div>


                    <div class="row">
                      <label class="col-sm-2 col-form-label">Email Id <span class="error_msg">*</span></label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <input class="form-control" type="email" name="email" id="email" required="required"  value="<?= set_value('email');?>" />
                            <span class="error_msg" id="error_message"></span>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <label class="col-sm-2 col-form-label">Mobile Numbe <span class="error_msg">*</span></label>
                      <div class="col-sm-7">
                        <div class="form-group row">

                         <div class="col-lg-4 col-md-4 col-sm-1">
                          <div class="dropdown bootstrap-select show">
                            <select class="selectpicker"  data-style="select-with-transition" title="Select Mobile Code"  name="mobileCountryCode" required="required" >
                                   <?php
                                    $allMobileCountryList = getAllMobileCode();
                                    foreach($allMobileCountryList as $mobileCode)
                                      { ?>
                                    <option value="<?= $mobileCode['country_isd_code'];?>"><?= $mobileCode['country_isd_code'];?></option>
                                  <?php } ?>
                                  </select>
                             </div>
                           </div>
                         <div class="col-lg-8 col-md-8 col-sm-11 ">
                          <input class="form-control" type="text" name="mobile" maxlength="10" minlength="10" onkeypress="return isNumber(event)" value="<?= set_value('mobile');?>" required/>
                            <span class="error_msg"><?php echo form_error('mobile'); ?></span>
                            <span class="error_msg"><?php echo form_error('mobileCountryCode'); ?></span>
                        </div>
                        </div>
                      </div>
                    </div>

                     <div class="row">
                      <label class="col-sm-2 col-form-label">Address <span class="error_msg">*</span></label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <input class="form-control" type="text" name="address" id="address" required="required"  value="<?= set_value('address');?>" />
                            <span class="error_msg"><?php echo form_error('address'); ?></span>
                        </div>
                      </div>
                    </div>


                    <div class="row">
                    <label class="col-sm-2 col-form-label">Select City <span class="error_msg">*</span></label>
                    <div class="col-sm-7">
                      <div class="form-group">
                       <div class="col-lg-8 col-md-8 col-sm-1">
                      <!--   <div class="dropdown bootstrap-select show"> -->
                          <select class="selectpicker"  data-style="select-with-transition" title="Select City"  name="city" required="required" id="city" value="<?= set_value('city')?>">
                                 <?php
                                  foreach($city as $cityList)
                                    { ?>
                                  <option value="<?= $cityList['id'];?>"><?= $cityList['cityName'];?></option>
                                <?php } ?>
                                </select>
                                 <span class="error_msg"><?php echo form_error('cityList'); ?></span>
                         <!--   </div> -->
                         </div>
                        </div>
                       </div>
                      </div>

                    <div class="row">
                      <label class="col-sm-2 col-form-label">Password <span class="error_msg">*</span></label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <input class="form-control" id="password" type="password" name="password" minlength="6" required="true" maxlength="15" value="<?= set_value('password');?>"/>
                            <span class="error_msg"><?php echo form_error('password'); ?></span>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <label class="col-sm-2 col-form-label">Confirm Password <span class="error_msg">*</span></label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <input class="form-control" type="password" id="confirm_password" name="confirm_password" minlength="6"  required="true" maxlength="15"  value="<?= set_value('confirm_password');?>"/>
                            <span class="error_msg"><?php echo form_error('confirm_password'); ?></span>
                        </div>
                        <span class="error_msg" id="password_error"></span>
                      </div>
                    </div>

                      <div class="row" id="description">
                      <label class="col-sm-2 col-form-label">About Me </label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <textarea name="aboutMe" id="desc" class="form-control" rows="2" ></textarea>
                        </div>
                      </div>
                    </div>
      <!--**********************End  driver personal details ***************************************** -->

      <!--********************** driver Bank details ***************************************** -->
                    <div class="row">
                     <label class="col-sm-4 col-form-label"> </label>
                       <div class="col-sm-7">
                         <h2><u>Driver Bank  Details</u></h2>
                       </div>
                    </div>

                   <div class="row">
                      <label class="col-sm-2 col-form-label">Routing No. <span class="error_msg">*</span></label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <input class="form-control" type="text" name="routingNo" id="routingNo" required="required"  value="<?= set_value('routingNo');?>" />
                            <span class="error_msg"><?php echo form_error('routingNo'); ?></span>
                        </div>
                      </div>
                    </div>

                     <div class="row">
                      <label class="col-sm-2 col-form-label">Account No <span class="error_msg">*</span></label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <input class="form-control" type="text" name="accountNo" id="accountNo" required="required"  value="<?= set_value('accountNo');?>" onkeypress="return isNumber(event)" maxlength="20" minlength="8" />
                            <span class="error_msg"><?php echo form_error('accountNo'); ?></span>
                        </div>
                      </div>
                    </div>

                     <div class="row">
                      <label class="col-sm-2 col-form-label">Account Holder Name <span class="error_msg">*</span></label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <input class="form-control" type="text" name="accountHolderName" id="accountHolderName" required="required"  value="<?= set_value('accountHolderName');?>" />
                            <span class="error_msg"><?php echo form_error('accountHolderName'); ?></span>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                    <label class="col-sm-2 col-form-label">Select Account Type <span class="error_msg">*</span></label>
                    <div class="col-sm-7">
                      <div class="form-group">
                       <div class="col-lg-8 col-md-8 col-sm-1">
                      <!--   <div class="dropdown bootstrap-select show"> -->
                          <select class="selectpicker"  data-style="select-with-transition" title="Select Account Type"  name="accountType" required="required" id="accountType" value="<?= set_value('accountType')?>">
                                 <?php
                                  foreach($accountType as $accountTypeList)
                                    { ?>
                                  <option value="<?= $accountTypeList['id'];?>"><?= $accountTypeList['accountType'];?></option>
                                <?php } ?>
                                </select>
                                 <span class="error_msg"><?php echo form_error('accountType'); ?></span>
                          <!--  </div> -->
                         </div>
                        </div>
                       </div>
                      </div>


      <!--********************** End driver bank details ***************************************** -->


      <!--********************** driver Vehicle details ***************************************** -->
                    <div class="row">
                     <label class="col-sm-4 col-form-label"> </label>
                       <div class="col-sm-7">
                         <h2><u>Driver Vehicle  Details</u></h2>
                       </div>
                    </div>


                     <div class="row">
                      <label class="col-sm-2 col-form-label">Vehicle Plate No <span class="error_msg">*</span></label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <input class="form-control" type="text" name="vehiclePlateNo" id="vehiclePlateNo" required="required"  value="<?= set_value('vehiclePlateNo');?>" />
                            <span class="error_msg"><?php echo form_error('vehiclePlateNo'); ?></span>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                    <label class="col-sm-2 col-form-label">Select Vehicle Type <span class="error_msg">*</span></label>
                    <div class="col-sm-7">
                      <div class="form-group">
                       <div class="col-lg-8 col-md-8 col-sm-1">
                      <!--   <div class="dropdown bootstrap-select show"> -->
                          <select class="selectpicker"  data-style="select-with-transition" title="Select Vehicle Type"  name="vehicleType" required="required" id="vehicleType" value="<?= set_value('vehicleType')?>">
                                 <?php
                                  foreach($vehicleType as $vehicleTypeList)
                                    { ?>
                                  <option value="<?= $vehicleTypeList['id'];?>"><?= $vehicleTypeList['vehicleType'];?></option>
                                <?php } ?>
                                </select>
                                 <span class="error_msg"><?php echo form_error('vehicleType'); ?></span>
                          <!--  </div> -->
                         </div>
                        </div>
                       </div>
                      </div>

                      <div class="row">
                    <label class="col-sm-2 col-form-label">Select Vehicle Mode <span class="error_msg">*</span></label>
                    <div class="col-sm-7">
                      <div class="form-group">
                       <div class="col-lg-8 col-md-8 col-sm-1">
                      <!--   <div class="dropdown bootstrap-select show"> -->
                          <select class="selectpicker"  data-style="select-with-transition" title="Select Vehicle Mode"  name="vehicleModel" required="required" id="vehicleModel" value="<?= set_value('vehicleModel')?>">
                                 <?php
                                  foreach($vehicleModel as $vehicleModelList)
                                    { ?>
                                  <option value="<?= $vehicleModelList['id'];?>"><?= $vehicleModelList['vehicleModel'];?></option>
                                <?php } ?>
                                </select>
                                 <span class="error_msg"><?php echo form_error('vehicleModel'); ?></span>
                          <!--  </div> -->
                         </div>
                        </div>
                       </div>
                      </div>

                      <div class="row">
                    <label class="col-sm-2 col-form-label">Select Vehicle Colour <span class="error_msg">*</span></label>
                    <div class="col-sm-7">
                      <div class="form-group">
                       <div class="col-lg-8 col-md-8 col-sm-1">
                      <!--   <div class="dropdown bootstrap-select show"> -->
                          <select class="selectpicker"  data-style="select-with-transition" title="Select Vehicle Colour"  name="vehicleColour" required="required" id="vehicleColour" value="<?= set_value('vehicleColour')?>">
                                 <?php
                                  foreach($vehicleColour as $vehicleColourList)
                                    { ?>
                                  <option value="<?= $vehicleColourList['id'];?>"><?= $vehicleColourList['vehicleColour'];?></option>
                                <?php } ?>
                                </select>
                                 <span class="error_msg"><?php echo form_error('vehicleColour'); ?></span>
                          <!--  </div> -->
                         </div>
                        </div>
                       </div>
                      </div>

                      <div class="row">
                    <label class="col-sm-2 col-form-label">Vehicle Registration Year <span class="error_msg">*</span></label>
                    <div class="col-sm-7">
                      <div class="form-group">
                       <div class="col-lg-8 col-md-8 col-sm-1">
                      <!--   <div class="dropdown bootstrap-select show"> -->
                          <select class="selectpicker"  data-style="select-with-transition" title="Registration Year"  name="registrationYear" required="required" id="registrationYear" value="<?= set_value('registrationYear')?>">
                                 <?php
                                  for($year = 1990; $year <= date("Y"); $year++)
                                    { ?>
                                  <option value="<?= $year ?>"><?= $year;?></option>
                                <?php } ?>
                                </select>
                                 <span class="error_msg"><?php echo form_error('registrationYear'); ?></span>
                          <!--  </div> -->
                         </div>
                        </div>
                       </div>
                      </div>

                      <div class="row">
                    <label class="col-sm-2 col-form-label">Child Seat Available<span class="error_msg">*</span></label>
                    <div class="col-sm-7">
                      <div class="form-group">
                       <div class="col-lg-8 col-md-8 col-sm-1">
                      <!--   <div class="dropdown bootstrap-select show"> -->
                          <select class="selectpicker"  data-style="select-with-transition" title="Child Seat Available"  name="childSeatAvailable" required="required" id="childSeatAvailable" value="<?= set_value('childSeatAvailable')?>">
                              
                                </select>
                                 <span class="error_msg"><?php echo form_error('childSeatAvailable'); ?></span>
                          <!--  </div> -->
                         </div>
                        </div>
                       </div>
                      </div>

                      <div class="row">
                    <label class="col-sm-2 col-form-label">Select Maximum Person<span class="error_msg">*</span></label>
                    <div class="col-sm-7">
                      <div class="form-group">
                       <div class="col-lg-8 col-md-8 col-sm-1">
                      <!--   <div class="dropdown bootstrap-select show"> -->
                          <select class="selectpicker"  data-style="select-with-transition" title="Select Maximum Person"  name="maximumPerson" required="required" id="maximumPerson" value="<?= set_value('maximumPerson')?>">

                            </select>
                                 <span class="error_msg"><?php echo form_error('maximumPerson'); ?></span>
                          <!--  </div> -->
                         </div>
                        </div>
                       </div>
                      </div>



                      <div class="row">
                    <label class="col-sm-2 col-form-label">Select Maximum Luggage<span class="error_msg">*</span></label>
                    <div class="col-sm-7">
                      <div class="form-group">
                       <div class="col-lg-8 col-md-8 col-sm-1">
                      <!--   <div class="dropdown bootstrap-select show"> -->
                          <select class="selectpicker"  data-style="select-with-transition" title="Select Maximum Luggage"  name="maximumLuggage" required="required" id="maximumLuggage" value="<?= set_value('maximumLuggage')?>">

                            </select>
                                 <span class="error_msg"><?php echo form_error('maximumLuggage'); ?></span>
                          <!--  </div> -->
                         </div>
                        </div>
                       </div>
                      </div>


                      <div class="row">
                    <label class="col-sm-2 col-form-label">Select Airport<span class="error_msg">*</span></label>
                    <div class="col-sm-7">
                      <div class="form-group">
                       <div class="col-lg-8 col-md-8 col-sm-1">
                      <!--   <div class="dropdown bootstrap-select show"> -->
                          <select class="selectpicker"  data-style="select-with-transition" title="Select Airport"  name="airport" required="required" id="airport" value="<?= set_value('airport')?>">
                            </select>
                                 <span class="error_msg"><?php echo form_error('airport'); ?></span>
                          <!--  </div> -->
                         </div>
                        </div>
                       </div>
                      </div>


                   <div class="row">
                      <label class="col-sm-2 col-form-label">Vehicle Image </label>
                      <div class="col-md-3 col-sm-4">
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                        <div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                        <div>
                          <span class="btn btn-round btn-rose btn-file">
                            <span class="fileinput-new">Choose Image</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="file" name="vehicleImage" value="<?= set_value('vehicleImage');?>" accept="image/x-png,image/gif,image/jpeg,image/jpg,application/pdf" required/>
                          </span>
                          <br />
                             <span class="error_msg"><?php if($uploadError1 != ''){ echo $uploadError1; } else {echo '';}?></span>
                            <span class="error_msg"><?php echo form_error('vehicleImage'); ?></span>
                          <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                        </div>
                      </div>
                    </div>
                    </div>





      <!--********************** End driver Vehicle details ***************************************** -->



      <!--********************** driver License details ***************************************** -->
                    <div class="row">
                     <label class="col-sm-4 col-form-label"> </label>
                       <div class="col-sm-7">
                         <h2><u>Driver License  Details</u></h2>
                       </div>
                    </div>

                      <div class="row">
                      <label class="col-sm-2 col-form-label">License Front Image</label>
                      <div class="col-md-3 col-sm-4">
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                        <div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                        <div>
                          <span class="btn btn-round btn-rose btn-file">
                            <span class="fileinput-new">License Front Image</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="file" name="licenseFrontImage" value="<?= set_value('licenseFrontImage');?>" accept="image/x-png,image/gif,image/jpeg,image/jpg,application/pdf" required/>
                          </span>
                          <br />
                             <span class="error_msg"> <?php if($uploadError2 != ''){ echo $uploadError2; } else {echo '';}?></span>
                           <span class="error_msg"><?php echo form_error('licenseFrontImage'); ?></span>
                          <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                        </div>
                      </div>
                    </div>
                    </div>


                     <div class="row">
                      <label class="col-sm-2 col-form-label">License Back Image </label>
                      <div class="col-md-3 col-sm-4">
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                        <div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                        <div>
                          <span class="btn btn-round btn-rose btn-file">
                            <span class="fileinput-new">License Back Image</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="file" name="licenseBackImage" value="<?= set_value('licenseBackImage');?>" accept="image/x-png,image/gif,image/jpeg,image/jpg,application/pdf" required/>
                          </span>
                          <br />
                            <span class="error_msg"> <?php if($uploadError3 != ''){ echo $uploadError3; } else {echo '';}?></span>
                           <span class="error_msg"><?php echo form_error('licenseBackImage'); ?></span>
                          <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                        </div>
                      </div>
                    </div>
                    </div>



                    <div class="row">
                      <label class="col-sm-2 col-form-label">Upload Insurance </label>
                      <div class="col-md-3 col-sm-4">
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                        <div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                        <div>
                          <span class="btn btn-round btn-rose btn-file">
                            <span class="fileinput-new">Choose Document</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="file" name="insuranceFileImage" value="<?= set_value('insuranceFileImage');?>" accept="image/x-png,image/gif,image/jpeg,image/jpg,application/pdf" required/>
                          </span>
                          <br />
                           <span class="error_msg"> <?php if($uploadError4 != ''){ echo $uploadError4; } else {echo '';}?></span>
                          <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                        </div>
                      </div>
                    </div>
                    </div>


      <!--********************** End driver License details ***************************************** -->
                  </div>
                  <div class="card-footer ml-auto mr-auto">
                    <button type="submit" name="submit" id="submit" class="btn btn-rose">Insert</button>
                    <a href="<?= base_url('sub-admin-driver-list');?>" class="btn btn-primary pull-right" >Cancel</a>
                  </div>
                </div>
              </form>
            </div>
      </div>
    </div>
  </div>

<!-- Password and confirm password match -->
  <script  type="text/javascript" charset="utf-8" async defer>
      $('#confirm_password').on('keyup', function() {
           var confirm_password = $(this).val();
           var password = $('#password').val();
                 str3 = $.trim(confirm_password);
                 str4 = $.trim(password);
           // alert(email);
           if(str3 != str4)
           {
            $('#password_error').html('Password and Confirm-Password Must be Same');
          //$("#register_submit").attr("disabled", "disabled");
          $('#submit').attr('disabled',true);
          }
          else
           {
             $('#password_error').html('');
             $('#submit').attr('disabled',false)
          }

       });

  </script>
  <!-- check unique email from user,crew,ceo,branch manager table. -->
  <script type="text/javascript">
     $(document).ready(function() {
// datepicker
      $('#dt1').datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: "dd-mm-yy",
                yearRange: "-65:+00"
          });

            $('#email').on('keyup', function() {
                var email = $(this).val();
                // alert(email);
                $.ajax({
                    url: "<?= base_url();?>Common_controller/unique_email",
                    method: "POST",
                    data: {
                        email: email
                    },
                    success: function(data) {
                      //console.log(data);
                      var st = JSON.parse(data)
                        if (st.status != 'success')
                        {
                          $('#error_message').html('This Email id already regitser with us');
                          $('#submit').attr('disabled',true);
                          $('#password').attr('disabled',true);
                          $('#confirm_password').attr('disabled',true);

                        }
                        else
                        {
                            $('#error_message').html('');
                          $('#submit').attr('disabled',false);
                          $('#password').attr('disabled',false);
                          $('#confirm_password').attr('disabled',false);
                        }
                    }
                });

            });
        });
  </script>

 <!-- location wise ceo name -->
  <script>
    $(document).ready(function(){
      $('#location').on('change',function(){
       var locationId = $(this).val();
        if(locationId != '')
        {
          $.ajax({
                  url: "<?= base_url();?>Common_controller/ceoList",
                  method: "POST",
                  data: {
                      locationId: locationId
                  },
                  async : false,
                  cache : false,
                  success: function(data) {
                    var response = JSON.parse(data);
                          if(response.length>0)
                          {
                            //alert(response.length);
                            html = '';
                            for(i=0;i<response.length;i++){
                              html +='<option value="'+response[i]['id']+'">'+response[i]['name']+'</option>';
                            }
                            $('select[name = "ceo"]').html(html);
                            $('.selectpicker').selectpicker('refresh');
                          }
                          else
                          {
                             $('select[name = "ceo"]').empty();
                             $('.selectpicker').selectpicker('refresh');
                          }
                      }
                    });
            }
            else
            {
             $('select[name="ceo"]').empty();
             $('.selectpicker').selectpicker('refresh');
            }
    });
  });
  </script>


<!-- branch wise branch manager name -->
  <script>
    $(document).ready(function(){
      $('#branch').on('change',function(){
       var branchId = $(this).val();
        if(branchId != '')
        {
          $.ajax({
                  url: "<?= base_url();?>Common_controller/branchManagerList",
                  method: "POST",
                  data: {
                      branchId: branchId
                  },
                  async : false,
                  cache : false,
                  success: function(data) {
                    var response1 = JSON.parse(data);
                          if(response1.length>0)
                          {
                            //alert(response.length);
                            html = '';
                            for(i=0;i<response1.length;i++){
                              html +='<option value="'+response1[i]['id']+'">'+response1[i]['name']+'</option>';
                            }
                            //alert(html);
                            $('select[name = "branchManager"]').html(html);
                            $('.selectpicker').selectpicker('refresh');
                          }
                          else
                          {
                             $('select[name = "branchManager"]').empty();
                             $('.selectpicker').selectpicker('refresh');
                          }
                      }
                    });
            }
            else
            {
             $('select[name="branchManager"]').empty();
             $('.selectpicker').selectpicker('refresh');
            }
    });
  });
  </script>



  <!-- Getting max (child seat, person, luggage) according to vehicle type -->
    <script>
      $(document).ready(function(){
         $('#vehicleType').on('change', function(){
            var vehicleType = $(this).val();
             if(vehicleType != '')
               {
                 $.ajax({
                         url: "<?= base_url();?>Common_controller/getMaxChildPersonLuggage",
                         method: "POST",
                         data: {
                             vehicleType: vehicleType
                         },
                         async : false,
                         cache : false,
                         success: function(data)
                          {
                              var response     = JSON.parse(data);
                              var maxChildSeat = response.childSeatAvailable;
                              var maxLuggage   = response.maximumLuggage;
                              var maxPerson    = response.maximumPerson;
                              var html1         = '';
                              var html2         = '';
                              var html3         = '';

                               for(i = 0; i <= maxChildSeat; i++)
                               {
                                 html1 +='<option value="'+i+'">'+i+'</option>';
                               }
                               //alert(html);
                               $('select[name = "childSeatAvailable"]').html(html1);
                               $('.selectpicker').selectpicker('refresh'); // max child select

                               for(j = 0; j <= maxLuggage; j++)
                               {
                                 html2 +='<option value="'+j+'">'+j+'</option>';
                               }
                               //alert(html);
                               $('select[name = "maximumLuggage"]').html(html2);
                               $('.selectpicker').selectpicker('refresh'); // max luggage select

                               for(k = 1; k <= maxPerson; k++)
                               {
                                 html3 +='<option value="'+k+'">'+k+'</option>';
                               }
                               //alert(html);
                               $('select[name = "maximumPerson"]').html(html3);
                               $('.selectpicker').selectpicker('refresh'); // max person select
                             }
                          });
               }
                 else
                 {
                    $('select[name="childSeatAvailable"]').empty()
                    $('select[name="maximumLuggage"]').empty();
                    $('select[name="maximumPerson"]').empty();
                    $('.selectpicker').selectpicker('refresh');
                 }
         });
      });
    </script>
