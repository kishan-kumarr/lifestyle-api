 <div class="content">
        <div class="container-fluid">
          <div class="row">

               <div class="col-md-12">
              <form id="RangeValidation" class="form-horizontal" action="<?= base_url('add-user');?>" method="post">
                <div class="card ">
                  <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                      <h4 class="card-title">Add User</h4>
                    </div>
                  </div>
                  <div class="card-body ">
                    <div class="row">
                      <label class="col-sm-2 col-form-label">Title <span class="error_msg">*</span> </label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <input class="form-control" type="text" name="title"  required="required"  value="<?= set_value('title');?>"/>
                           <span class="error_msg"><?php echo form_error('title'); ?></span>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-sm-2 col-form-label">First Name <span class="error_msg">*</span> </label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <input class="form-control" type="text" name="firstName"  required="required"  value="<?= set_value('firstName');?>"/>
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
                      <label class="col-sm-2 col-form-label">Email Id <span class="error_msg">*</span></label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <input class="form-control" type="email" name="email" required="required"  value="<?= set_value('email');?>" />
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
                  </div>
                  <div class="card-footer ml-auto mr-auto">
                    <button type="submit" name="submit" id="submit" class="btn btn-rose">Insert</button>
                    <a href="<?= base_url('user-list');?>" class="btn btn-primary pull-right" >Cancel</a>
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
