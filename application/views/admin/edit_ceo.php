 <div class="content">
        <div class="container-fluid">
          <div class="row">

               <div class="col-md-12">
              <form id="RangeValidation" class="form-horizontal" action="<?= base_url('update-ceo/'.$singleRecord['id']);?>" method="post" enctype="multipart/form-data">
                <div class="card ">
                  <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                      <h4 class="card-title">Update Ceo</h4>
                    </div>
                  </div>
                  <div class="card-body ">
                  
                    <div class="row">
                      <label class="col-sm-2 col-form-label">CEO Name <span class="error_msg">*</span> </label>
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
                          <input type="hidden" name="hiddenID" id="updateId" value="<?= $singleRecord['id'];?>">
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
                  
               

                    <div class="row">
                      <label class="col-sm-2 col-form-label">Upload Document </label>
                      <div class="col-md-3 col-sm-4">
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                        <div class="fileinput-preview fileinput-exists thumbnail img-circle">
                        </div>
                        <div>
                          <span class="btn btn-round btn-rose btn-file">
                            <span class="fileinput-new">Choose Document</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="file" name="document" value="<?= set_value('document')?>" accept="application/pdf"/>
                            <input type="hidden" name="hiddenDocument" value="<?= $singleRecord['document'];?>">
                          </span>
                          <br />
                           <span class="error_msg"><b>Note:</b> Please upload pdf file only.</span>

                          <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                        </div>
                      </div>
                    </div>
                    </div>


                   <div class="row">
                    <label class="col-sm-2 col-form-label">Select Location <span class="error_msg">*</span></label>
                    <div class="col-sm-7">
                      <div class="form-group">
                       <div class="col-lg-8 col-md-8 col-sm-1">
                        <div class="dropdown bootstrap-select show">
                          <select class="selectpicker"  data-style="select-with-transition" title="Select Location"  name="location" required="required" value="<?= set_value('location')?>">
                                 <?php
                                  foreach($locationList as $location)
                                    { ?>
                                  <option value="<?= $location['id'];?>" <?php if($singleRecord['location'] == $location['id']){echo 'selected';}?>><?= $location['locationName'];?></option>
                                <?php } ?>
                                </select>
                                 <span class="error_msg"><?php echo form_error('location'); ?></span>
                           </div>
                         </div>
                        </div>
                       </div>
                      </div>  

                    <div class="row">
                      <label class="col-sm-2 col-form-label">Password <span class="error_msg">*</span></label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <input class="form-control" id="password" type="password" name="password" minlength="6" required="true" maxlength="15" value="<?= $singleRecord['normal_password'];?>"/>
                            <span class="error_msg"><?php echo form_error('password'); ?></span>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-sm-2 col-form-label">Confirm Password <span class="error_msg">*</span></label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <input class="form-control" type="password" id="confirm_password" name="confirm_password" minlength="6"  required="true" maxlength="15"  value="<?= $singleRecord['normal_password'];?>"/>
                            <span class="error_msg"><?php echo form_error('confirm_password'); ?></span>
                        </div>
                        <span class="error_msg" id="password_error"></span>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer ml-auto mr-auto">
                    <button type="submit" name="submit" id="submit" class="btn btn-rose">Update</button>
                    <a href="<?= base_url('ceo-list');?>" class="btn btn-primary pull-right" >Cancel</a>
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
            $('#email').on('keyup', function() {
                var email = $(this).val();
                var id = $('#updateId').val();
                // alert(email);
                $.ajax({
                    url: "<?= base_url();?>Common_controller/update_unique_email",
                    method: "POST",
                    data: {
                        email: email,
                        id:id
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

