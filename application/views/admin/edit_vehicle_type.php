 <div class="content">
        <div class="container-fluid">
          <div class="row">
               <div class="col-md-12">
              <form id="RangeValidation" class="form-horizontal" action="<?= base_url('update-vehicle-type/'.$singleRecord['id']);?>" method="post" enctype="multipart/form-data">
                <div class="card ">
                  <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                      <h4 class="card-title">Update Vehicle Type</h4>
                    </div>
                  </div>
                  <div class="card-body ">

                    <div class="row">
                      <label class="col-sm-2 col-form-label">Vehicle Type  <span class="error_msg">*</span> </label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <input class="form-control" type="text" name="vehicleType"  required="required"  value="<?= $singleRecord['vehicleType'];?>"/>
                           <span class="error_msg"><?php echo form_error('vehicleType'); ?></span>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                  <label class="col-sm-2 col-form-label">Select Maximum Child Seat<span class="error_msg">*</span></label>
                  <div class="col-sm-7">
                    <div class="form-group">
                     <div class="col-lg-8 col-md-8 col-sm-1">
                    <!--   <div class="dropdown bootstrap-select show"> -->
                        <select class="selectpicker"  data-style="select-with-transition" title="Child Seat Available"  name="childSeatAvailable" required="required" id="childSeatAvailable" value="<?= set_value('childSeatAvailable')?>">
                               <?php
                                for($child = 0; $child <= 2; $child++)
                                  { ?>
                                <option value="<?= $child;?>" <?php if($singleRecord['childSeatAvailable'] == $child) { echo 'selected'; }?>><?= $child;?></option>
                              <?php } ?>
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
                               <?php
                                for($person = 1; $person <= 5; $person++)
                                  { ?>
                                <option value="<?= $person;?>" <?php if($singleRecord['maximumPerson'] == $person) { echo 'selected'; }?>><?= $person;?></option>
                              <?php } ?>
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
                               <?php
                                for($luggage = 0; $luggage <= 5; $luggage++)
                                  { ?>
                                <option value="<?= $luggage;?>" <?php if($singleRecord['maximumLuggage'] == $luggage) { echo 'selected'; }?>><?= $luggage;?></option>
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
                            <img src="<?= base_url('assets/admin/img/');?><?php if($singleRecord['vehicleImage'] == ''){echo 'user.png';} else { echo $singleRecord['vehicleImage'];}?>" alt="banner image" style="height: 80px;">
                          </div>
                         <div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                         <div>
                           <span class="btn btn-round btn-rose btn-file">
                             <span class="fileinput-new">Choose Image</span>
                             <span class="fileinput-exists">Change</span>
                             <input type="file" name="vehicleImage" accept="image/x-png,image/gif,image/jpeg,image/jpg,application/pdf" />
                             <input type="hidden" name="hiddenvehicleImage" value="<?= $singleRecord['vehicleImage']; ?>" />
                           </span>
                           <br />
                             <span class="error_msg"><?php echo form_error('vehicleImage'); ?></span>
                           <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                         </div>
                       </div>
                     </div>
                     </div>


                  </div>
                  <div class="card-footer ml-auto mr-auto">
                    <button type="submit" name="submit" id="submit" class="btn btn-rose">Update</button>
                    <a href="<?= base_url('vehicle-type');?>" class="btn btn-primary pull-right" >Cancel</a>
                  </div>
                </div>
              </form>
            </div>
      </div>
    </div>
  </div>
