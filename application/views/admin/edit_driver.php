 <div class="content">
        <div class="container-fluid">
          <div class="row">
               <div class="col-md-12">
              <form id="RangeValidation" class="form-horizontal" action="<?= base_url('update-driver/'.$singleRecord[0]['id']);?>" method="post" enctype="multipart/form-data">
                <div class="card ">
                  <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                      <h4 class="card-title">Update Driver</h4>
                    </div>
                  </div>
                  <div class="card-body ">

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
                          <input class="form-control" type="text" name="firstName"  required="required"  value="<?= $singleRecord[0]['firstName'];?>"/>
                           <span class="error_msg"><?php echo form_error('firstName'); ?></span>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <label class="col-sm-2 col-form-label">Last Name  </label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <input class="form-control" type="text" name="lastName"  value="<?= $singleRecord[0]['lastName'];?>"/>
                           <span class="error_msg"><?php echo form_error('lastName'); ?></span>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <label class="col-sm-2 col-form-label">D.O.B <span class="error_msg">*</span> </label>
                      <div class="col-sm-7">
                        <div class="row form-group form-md-line-input form-md-floating-label">
                             <input type="text" class="form-control" value="<?php echo $singleRecord[0]['dob']; ?>" autocomplete="off" name="dob" id="dt1"  required>
                            <span class="error_msg"><?php echo form_error('dob'); ?></span>
                        </div>
                      </div>
                    </div>


                    <div class="row">
                      <label class="col-sm-2 col-form-label">Email Id <span class="error_msg">*</span></label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <input class="form-control" type="email" name="email" id="email" required="required"  value="<?= $singleRecord[0]['email'];?>" />
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
                            <select class="selectpicker"  data-style="select-with-transition"  name="mobileCountryCode" required="required" >
                                   <?php
                                    $allMobileCountryList = getAllMobileCode();
                                    foreach($allMobileCountryList as $mobileCode)
                                      { ?>
                                    <option value="<?= $mobileCode['country_isd_code'];?>" <?php if($singleRecord[0]['mobileCountryCode'] == $mobileCode['country_isd_code']){ echo 'selected';} ?>><?= $mobileCode['country_isd_code'];?></option>
                                  <?php } ?>
                                  </select>
                             </div>
                           </div>
                         <div class="col-lg-8 col-md-8 col-sm-11 ">
                          <input class="form-control" type="text" name="mobile" maxlength="10" minlength="10" onkeypress="return isNumber(event)" value="<?= $singleRecord[0]['mobile'];?>" required/>
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
                          <input class="form-control" type="text" name="address" id="address" required="required"  value="<?= $singleRecord[0]['address'];?>" />
                            <span class="error_msg"><?php echo form_error('address'); ?></span>
                        </div>
                      </div>
                    </div>


                   <div class="row">
                    <label class="col-sm-2 col-form-label">Select Location <span class="error_msg">*</span></label>
                    <div class="col-sm-7">
                      <div class="form-group">
                       <div class="col-lg-8 col-md-8 col-sm-1">
                      <!--   <div class="dropdown bootstrap-select show"> -->
                          <select class="selectpicker"  data-style="select-with-transition"  name="location" required="required" id="location" value="<?= set_value('location')?>">
                                 <?php
                                  foreach($locationList as $location)
                                    { ?>
                                  <option value="<?= $location['id'];?>" <?php if($singleRecord[0]['location'] == $location['id']){echo 'selected';}?>><?= $location['locationName'];?></option>
                                <?php } ?>
                                </select>
                                 <span class="error_msg"><?php echo form_error('location'); ?></span>
                          <!--  </div> -->
                         </div>
                        </div>
                       </div>
                      </div>


                    <div class="row">
                    <label class="col-sm-2 col-form-label">Select CEO <span class="error_msg">*</span></label>
                    <div class="col-sm-7">
                      <div class="form-group">
                       <div class="col-lg-8 col-md-8 col-sm-1">
                       <!--  <div class="dropdown bootstrap-select show"> -->
                          <select class="selectpicker"  data-style="select-with-transition"  id="ceo"  name="ceo" required="required" value="<?= set_value('ceo')?>">
                                 <?php
                                  foreach($ceoList as $ceoName1)
                                    { ?>
                                  <option value="<?= $ceoName1['id'];?>" <?php if($singleRecord[0]['under_ceo'] == $ceoName1['id']){ echo 'selected';}?>><?= $ceoName1['name'];?></option>
                                <?php } ?>
                            </select>
                            <span class="error_msg"><?php echo form_error('ceo'); ?></span>
                          <!--  </div> -->
                         </div>
                        </div>
                       </div>
                      </div>

                      <div class="row">
                      <label class="col-sm-2 col-form-label">Select Branch <span class="error_msg">*</span></label>
                      <div class="col-sm-7">
                        <div class="form-group">
                         <div class="col-lg-8 col-md-8 col-sm-1">
                         <!--  <div class="dropdown bootstrap-select show"> -->
                            <select class="selectpicker" id="branch"  data-style="select-with-transition"  name="branch" required="required" value="<?= set_value('branch')?>">
                                    <?php
                                    foreach($branchList as $branch)
                                      { ?>
                                    <option value="<?= $branch['id'];?>" <?php if($singleRecord[0]['branch'] == $branch['id']){ echo'selected';} ?>><?= $branch['branchName'];?></option>
                                  <?php } ?>
                                  </select>
                                   <span class="error_msg"><?php echo form_error('branch'); ?></span>
                             <!-- </div> -->
                           </div>
                          </div>
                         </div>
                        </div>


                    <div class="row">
                      <label class="col-sm-2 col-form-label">Select Branch Manager <span class="error_msg">*</span></label>
                      <div class="col-sm-7">
                        <div class="form-group">
                         <div class="col-lg-8 col-md-8 col-sm-1">
                        <!--   <div class="dropdown bootstrap-select show"> -->
                            <select class="selectpicker"  data-style="select-with-transition"  id="branchManager"  name="branchManager" required="required" value="<?= set_value('branchManager')?>">
                              <?php
                                  foreach($relatedBranchList as $branchManagerName1)
                                    { ?>
                                  <option value="<?= $branchManagerName1['id'];?>" <?php if($singleRecord[0]['under_branch_manager'] == $branchManagerName1['id']){ echo 'selected';}?>><?= $branchManagerName1['name'];?></option>
                                <?php } ?>
                              </select>
                              <span class="error_msg"><?php echo form_error('branchManager'); ?></span>
                           <!--   </div> -->
                           </div>
                          </div>
                         </div>
                        </div>

                    <div class="row">
                    <label class="col-sm-2 col-form-label">Select City <span class="error_msg">*</span></label>
                    <div class="col-sm-7">
                      <div class="form-group">
                       <div class="col-lg-8 col-md-8 col-sm-1">
                      <!--   <div class="dropdown bootstrap-select show"> -->
                          <select class="selectpicker"  data-style="select-with-transition"   name="city" required="required" id="city" value="<?= set_value('city')?>">
                                 <?php
                                  foreach($city as $cityList)
                                    { ?>
                                  <option value="<?= $cityList['id'];?>" <?php if($singleRecord[0]['city'] == $cityList['id']){ echo 'selected';}?>><?= $cityList['cityName'];?></option>
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
                          <input class="form-control" id="password" type="password" name="password" minlength="6" required="true" maxlength="15" value="<?= $singleRecord[0]['normalPassword'];?>"/>
                            <span class="error_msg"><?php echo form_error('password'); ?></span>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <label class="col-sm-2 col-form-label">Confirm Password <span class="error_msg">*</span></label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <input class="form-control" type="password" id="confirm_password" name="confirm_password" minlength="6"  required="true" maxlength="15"  value="<?= $singleRecord[0]['normalPassword'];?>"/>
                            <span class="error_msg"><?php echo form_error('confirm_password'); ?></span>
                        </div>
                        <span class="error_msg" id="password_error"></span>
                      </div>
                    </div>

                      <div class="row" id="description">
                      <label class="col-sm-2 col-form-label">About Me </label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <textarea name="aboutMe" id="desc" class="form-control" rows="2" ><?= $singleRecord[0]['aboutMe'];?></textarea>
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
                          <input class="form-control" type="text" name="routingNo" id="routingNo" required="required"  value="<?= $singleRecord[0]['routingNo'];?>" />
                            <span class="error_msg"><?php echo form_error('routingNo'); ?></span>
                        </div>
                      </div>
                    </div>

                     <div class="row">
                      <label class="col-sm-2 col-form-label">Account No <span class="error_msg">*</span></label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <input class="form-control" type="text" name="accountNo" id="accountNo" required="required"  value="<?= $singleRecord[0]['accountNo'];?>" onkeypress="return isNumber(event)" maxlength="20" minlength="8" />
                            <span class="error_msg"><?php echo form_error('accountNo'); ?></span>
                        </div>
                      </div>
                    </div>

                     <div class="row">
                      <label class="col-sm-2 col-form-label">Account Holder Name <span class="error_msg">*</span></label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <input class="form-control" type="text" name="accountHolderName" id="accountHolderName" required="required"  value="<?= $singleRecord[0]['accountHolderName'];?>" />
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
                          <select class="selectpicker"  data-style="select-with-transition"   name="accountType" required="required" id="accountType" value="<?= set_value('accountType')?>">
                                 <?php
                                  foreach($accountType as $accountTypeList)
                                    { ?>
                                  <option value="<?= $accountTypeList['id'];?>" <?php if($singleRecord[0]['accountType'] == $accountTypeList['accountType']) { echo 'selected'; }?>><?= $accountTypeList['accountType'];?></option>
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
                          <input class="form-control" type="text" name="vehiclePlateNo" id="vehiclePlateNo" required="required"  value="<?= $singleRecord[0]['vehiclePlateNo'];?>" />
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
                          <select class="selectpicker"  data-style="select-with-transition"   name="vehicleType" required="required" id="vehicleType" value="<?= set_value('vehicleType')?>">
                                 <?php
                                  foreach($vehicleType as $vehicleTypeList)
                                    { ?>
                                  <option value="<?= $vehicleTypeList['id'];?>" <?php if($singleRecord[0]['vehicleType'] == $vehicleTypeList['vehicleType']) { echo 'selected'; }?>><?= $vehicleTypeList['vehicleType'];?></option>
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
                          <select class="selectpicker"  data-style="select-with-transition"  name="vehicleModel" required="required" id="vehicleModel" value="<?= set_value('vehicleModel')?>">
                                 <?php
                                  foreach($vehicleModel as $vehicleModelList)
                                    { ?>
                                  <option value="<?= $vehicleModelList['id'];?>"  <?php if($singleRecord[0]['vehicleModel'] == $vehicleModelList['vehicleModel']) { echo 'selected'; }?>><?= $vehicleModelList['vehicleModel'];?></option>
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
                          <select class="selectpicker"  data-style="select-with-transition"   name="vehicleColour" required="required" id="vehicleColour" value="<?= set_value('vehicleColour')?>">
                                 <?php
                                  foreach($vehicleColour as $vehicleColourList)
                                    { ?>
                                  <option value="<?= $vehicleColourList['id'];?>" <?php if($singleRecord[0]['vehicleColour'] == $vehicleColourList['vehicleColour']) { echo 'selected'; }?>><?= $vehicleColourList['vehicleColour'];?></option>
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
                          <select class="selectpicker"  data-style="select-with-transition"  name="registrationYear" required="required" id="registrationYear" value="<?= set_value('registrationYear')?>">
                                 <?php
                                  for($year = 1990; $year <= date("Y"); $year++)
                                    { ?>
                                  <option value="<?= $year ?>" <?php if($singleRecord[0]['registrationYear'] == $year) { echo 'selected'; }?>><?= $year;?></option>
                                <?php } ?>
                                </select>
                                 <span class="error_msg"><?php echo form_error('registrationYear'); ?></span>
                          <!--  </div> -->
                         </div>
                        </div>
                       </div>
                      </div>

                      <div class="row">
                    <label class="col-sm-2 col-form-label">Select Maximum Child Seat<span class="error_msg">*</span></label>
                    <div class="col-sm-7">
                      <div class="form-group">
                       <div class="col-lg-8 col-md-8 col-sm-1">
                      <!--   <div class="dropdown bootstrap-select show"> -->
                       <input type="hidden" id="selectedChildSeat" value="<?= $singleRecord[0]['childSeatAvailable']; ?>">
                          <select class="selectpicker"  data-style="select-with-transition"   name="childSeatAvailable" required="required" id="childSeatAvailable" value="<?= set_value('childSeatAvailable')?>">
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
                       <input type="hidden" id="selectedPerson" value="<?= $singleRecord[0]['maximumPerson']; ?>">
                          <select class="selectpicker"  data-style="select-with-transition" name="maximumPerson" required="required" id="maximumPerson" value="<?= set_value('maximumPerson')?>">

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
                      <input type="hidden" id="selectedLuggage" value="<?= $singleRecord[0]['maximumLuggage']; ?>">

                          <select class="selectpicker"  data-style="select-with-transition"  name="maximumLuggage" required="required" id="maximumLuggage" value="<?= set_value('maximumLuggage')?>">

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
                          <select class="selectpicker"  data-style="select-with-transition"   name="airport" required="required" id="airport" >
                                 <?php
                                  foreach($airportList as $airport)
                                    { ?>
                                  <option value="<?= $airport['id'];?>" <?php if($singleRecord[0]['airport'] == $airport['id']) { echo 'selected'; }?>><?= $airport['airportName'];?></option>
                                <?php } ?>
                                </select>
                                 <span class="error_msg"><?php echo form_error('maximumLuggage'); ?></span>
                          <!--  </div> -->
                         </div>
                        </div>
                       </div>
                      </div>


                   <div class="row">
                      <label class="col-sm-2 col-form-label">Vehicle Image <span class="error_msg">*</span></label>
                      <div class="col-md-3 col-sm-4">
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                         <div class="fileinput-new thumbnail img-circle">
                           <img src="<?= base_url('assets/admin/document/driver/');?><?php if($singleRecord[0]['vehicleImage'] == ''){echo 'user.png';} else { echo $singleRecord[0]['vehicleImage'];}?>" alt="banner image" style="height: 80px;">
                         </div>
                        <div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                        <div>
                          <span class="btn btn-round btn-rose btn-file">
                            <span class="fileinput-new">Choose Image</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="file" name="vehicleImage" accept="image/x-png,image/gif,image/jpeg,image/jpg,application/pdf" />
                            <input type="hidden" name="hiddenvehicleImage" value="<?= $singleRecord[0]['vehicleImage']; ?>" />
                          </span>
                          <br />
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
                      <label class="col-sm-2 col-form-label">License Front Image <span class="error_msg">*</span></label>
                      <div class="col-md-3 col-sm-4">
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                         <div class="fileinput-new thumbnail img-circle">
                           <img src="<?= base_url('assets/admin/document/driver/');?><?php if($singleRecord[0]['licenseFrontImage'] == ''){echo 'user.png';} else { echo $singleRecord[0]['licenseFrontImage'];}?>" alt="banner image" style="height: 80px;">
                         </div>
                        <div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                        <div>
                          <span class="btn btn-round btn-rose btn-file">
                            <span class="fileinput-new">License Front Image</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="file" name="licenseFrontImage" value="<?= set_value('licenseFrontImage');?>" accept="image/x-png,image/gif,image/jpeg,image/jpg,application/pdf" />
                             <input type="hidden" name="hiddenlicenseFrontImage" value="<?= $singleRecord[0]['licenseFrontImage']; ?>" />
                          </span>
                          <br />
                           <span class="error_msg"><?php echo form_error('licenseFrontImage'); ?></span>
                          <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                        </div>
                      </div>
                    </div>
                    </div>


                     <div class="row">
                      <label class="col-sm-2 col-form-label">License Back Image <span class="error_msg">*</span></label>
                      <div class="col-md-3 col-sm-4">
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                         <div class="fileinput-new thumbnail img-circle">
                           <img src="<?= base_url('assets/admin/document/driver/');?><?php if($singleRecord[0]['licenseBackImage'] == ''){echo 'user.png';} else { echo $singleRecord[0]['licenseBackImage'];}?>" alt="banner image" style="height: 80px;">
                         </div>
                        <div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                        <div>
                          <span class="btn btn-round btn-rose btn-file">
                            <span class="fileinput-new">License Back Image</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="file" name="licenseBackImage" value="<?= set_value('licenseBackImage');?>" accept="image/x-png,image/gif,image/jpeg,image/jpg,application/pdf" />
                            <input type="hidden" name="hiddenlicenseBackImage" value="<?= $singleRecord[0]['licenseBackImage']; ?>" >
                          </span>
                          <br />
                           <span class="error_msg"><?php echo form_error('licenseBackImage'); ?></span>
                          <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                        </div>
                      </div>
                    </div>
                    </div>



                    <div class="row">
                      <label class="col-sm-2 col-form-label">Upload Insurance <span class="error_msg">*</span></label>
                      <div class="col-md-3 col-sm-4">
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                         <div class="fileinput-new thumbnail img-circle">
                           <img src="<?= base_url('assets/admin/document/driver/');?><?php if($singleRecord[0]['insuranceFileImage'] == ''){echo 'user.png';} else { echo $singleRecord[0]['insuranceFileImage'];}?>" alt="banner image" style="height: 80px;">
                         </div>
                        <div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                        <div>
                          <span class="btn btn-round btn-rose btn-file">
                            <span class="fileinput-new">Choose Document</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="file" name="insuranceFileImage" value="<?= set_value('insuranceFileImage');?>" accept="image/x-png,image/gif,image/jpeg,image/jpg,application/pdf" />
                            <input type="hidden" name="hiddeninsuranceFileImage" value="<?= $singleRecord[0]['insuranceFileImage'];?>">
                          </span>
                          <br />

                          <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                        </div>
                      </div>
                    </div>
                    </div>


      <!--********************** End driver License details ***************************************** -->
                  </div>
                  <div class="card-footer ml-auto mr-auto">
                    <button type="submit" name="submit" id="submit" class="btn btn-rose">Update</button>
                    <a href="<?= base_url('driver-list');?>" class="btn btn-primary pull-right" >Cancel</a>
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
                maxDate: '-18Y',
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

  <!-- onload -->

    <!-- Getting max (child seat, person, luggage) according to vehicle type -->
      <script>
        $(document).ready(function(){
          var selectedChildSeat = $('#selectedChildSeat').val();
          var selectedPerson    = $('#selectedPerson').val();
          var selectedLuggage   = $('#selectedLuggage').val();

              var vehicleType   = $('#vehicleType').val();
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
                                var html1        = '';
                                var html2        = '';
                                var html3        = '';

                                 for(i = 0; i <= maxChildSeat; i++)
                                 {
                                   var select1 =  (selectedChildSeat == i) ? 'selected' : '';
                                   html1 +='<option value="'+i+'" '+select1+'>'+i+'</option>';
                                 }
                                 $('select[name = "childSeatAvailable"]').html(html1);
                                 $('.selectpicker').selectpicker('refresh'); // max child select



                                 for(j = 0; j <= maxLuggage; j++)
                                 {
                                   var select2 =  (selectedLuggage == j) ? 'selected' : '';
                                   html2 +='<option value="'+j+'" '+select2+'>'+j+'</option>';
                                 }
                                 $('select[name = "maximumLuggage"]').html(html2);
                                 $('.selectpicker').selectpicker('refresh'); // max luggage select




                                 for(k = 1; k <= maxPerson; k++)
                                 {
                                  var select3 =  (selectedPerson == k) ? 'selected' : '' ;
                                   html3 +='<option value="'+k+'" '+select3+'>'+k+'</option>';
                                 }
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
                              var html1        = '';
                              var html2        = '';
                              var html3        = '';

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



   <script>

    <!-- // set/fetch seat and luggage set by admin
     function changeSeatAvailable(vehicleType)
       {
         var selectedChildSeat = $('#selectedChildSeat').val();
         var selectedPerson    = $('#selectedPerson').val();
         var selectedLuggage   = $('#selectedLuggage').val();

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
                          var html1        = '';
                          var html2        = '';
                          var html3        = '';

                           for(i = 0; i <= maxChildSeat; i++)
                           {
                             var select1 =  (selectedChildSeat == i) ? 'selected' : '';
                             html1 +='<option value="'+i+'" '+select1+'>'+i+'</option>';
                           }
                           //alert(html);
                           $('select[name = "childSeatAvailable"]').html(html1);
                           $('.selectpicker').selectpicker('refresh'); // max child select

                           for(j = 0; j <= maxLuggage; j++)
                           {
                             var select2 =  (selectedLuggage == j) ? 'selected' : '';
                             html2 +='<option value="'+j+'" '+select2+'>'+j+'</option>';
                           }
                           //alert(html);
                           $('select[name = "maximumLuggage"]').html(html2);
                           $('.selectpicker').selectpicker('refresh'); // max luggage select

                           for(k = 1; k <= maxPerson; k++)
                           {
                             var select3 =  (selectedPerson == k) ? 'selected' : '' ;
                             html3 +='<option value="'+k+'" '+select3+'>'+k+'</option>';
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

       }



    </script>
