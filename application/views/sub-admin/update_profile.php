<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-rose card-header-icon">
           <div class="card-text">
              <h4 class="card-title">Update Profile</h4>
            </div>
          </div>
          <div class="card-body ">
           <form method="post" action="<?= base_url('sub-admin-update-profile');?>">

                     <div class="row">
                      <label class="col-sm-2 col-form-label">Branch Manager Name <span class="error_msg">*</span> </label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <input class="form-control" type="text" name="name"  required="required"  value="<?= $singleRecord['name'];?>"/>
                           <span class="error_msg"><?php echo form_error('name'); ?></span>
                        </div>
                      </div>
                    </div>
                    
                    <div class="row">
                      <label class="col-sm-2 col-form-label">Email Id <span class="error_msg">*</span></label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <input class="form-control" type="email" name="email" id="email" required="required"  value="<?= $singleRecord['email'];?>" />
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
                                    <option value="<?= $mobileCode['country_isd_code'];?>" <?php if($singleRecord['mobileCountryCode'] == $mobileCode['country_isd_code']){echo 'selected';}?>><?= $mobileCode['country_isd_code'];?></option>
                                  <?php } ?>
                                  </select>
                             </div>
                           </div>
                         <div class="col-lg-8 col-md-8 col-sm-11 ">
                          <input class="form-control" type="text" name="mobile" maxlength="10" minlength="10" onkeypress="return isNumber(event)" value="<?= $singleRecord['mobile'];?>" required/>
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
                          <input class="form-control" type="text" name="address" id="address" required="required"  value="<?= $singleRecord['address'];?>" />
                            <span class="error_msg"><?php echo form_error('address'); ?></span>
                        </div>
                      </div>
                    </div>

                    <!-- <div class="row">
                      <label class="col-sm-2 col-form-label">Upload Document </label>
                      <div class="col-md-3 col-sm-4">
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                        <div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                        <div>
                          <span class="btn btn-round btn-rose btn-file">
                            <span class="fileinput-new">Choose Document</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="file" name="document" value="<?//= set_value('image');?>" accept="application/pdf" />
                          </span>
                          <br />
                           <span class="error_msg"><b>Note:</b> Please upload pdf file only.</span>

                          <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                        </div>
                      </div>
                    </div>
                    </div> -->
                   <input type="hidden" name="hiddenDocument" value="<?= $singleRecord['document']; ?>">


                    <div class="row">
                      <label class="col-sm-2 col-form-label">Password <span class="error_msg">*</span></label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <input class="form-control" id="password" type="password" name="password" minlength="6" required="true" maxlength="15" value="<?= $singleRecord['normalPassword'];?>"/>
                            <span class="error_msg"><?php echo form_error('password'); ?></span>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-sm-2 col-form-label">Confirm Password <span class="error_msg">*</span></label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <input class="form-control" type="password" id="confirm_password" name="confirm_password" minlength="6"  required="true" maxlength="15"  value="<?= $singleRecord['normalPassword'];?>"/>
                            <span class="error_msg"><?php echo form_error('confirm_password'); ?></span>
                        </div>
                        <span class="error_msg" id="password_error"></span>
                      </div>
                    </div>

                  <div class="card-footer ml-auto mr-auto">
                    <button type="submit" name="submit" id="submit" class="btn btn-rose">Update</button>
                    <a href="<?= base_url('sub-admin-dashboard');?>" class="btn btn-primary pull-right" >Cancel</a>
                  </div>
                </div>
              </form>
            </div>
      </div>
    </div>
  </div>