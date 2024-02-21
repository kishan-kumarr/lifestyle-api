 <div class="content">
        <div class="container-fluid">
          <div class="row">
               <div class="col-md-12">
              <?php
                $formToken = uniqid();
                $this->session->set_userdata('tokenSession', $formToken);
              ?>   
              <form id="RangeValidation" class="form-horizontal" action="<?= base_url('add-branch-manager');?>" method="post" enctype="multipart/form-data">
              <input type="hidden" name="formToken" value="<?= $formToken;?>">  
              <div class="card ">
                  <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                      <h4 class="card-title">Add Branch Manager</h4>
                    </div>
                  </div>
                  <div class="card-body ">
                  
                    <div class="row">
                      <label class="col-sm-2 col-form-label">Branch Manager Name <span class="error_msg">*</span> </label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <input class="form-control" type="text" name="name"  required="required"  value="<?= set_value('name');?>"/>
                           <span class="error_msg"><?php echo form_error('name'); ?></span>
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
                      <label class="col-sm-2 col-form-label">Upload Document <span class="error_msg">*</span></label>
                      <div class="col-md-3 col-sm-4">
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                        <div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                        <div>
                          <span class="btn btn-round btn-rose btn-file">
                            <span class="fileinput-new">Choose Document</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="file" name="document" value="<?= set_value('image');?>" accept="application/pdf" required/>
                          </span>
                          <br />
                           <span class="error_msg"><b>Note:</b> <?php if($uploadError != ''){ echo $uploadError; } else {echo 'Please upload pdf file only.';}?></span>

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
                          <select class="selectpicker"  data-style="select-with-transition" title="Select Location"  name="location" required="required" id="location" value="<?= set_value('location')?>">
                                 <?php
                                  foreach($locationList as $location)
                                    { ?>
                                  <option value="<?= $location['id'];?>"><?= $location['locationName'];?></option>
                                <?php } ?>
                                </select>
                                 <span class="error_msg"><?php echo form_error('location'); ?></span>
                           </div>
                         </div>
                        </div>
                       </div>
                      </div> 

                      
                    <div class="row">
                    <label class="col-sm-2 col-form-label">Select CEO <span class="error_msg">*</span></label>
                    <div class="col-sm-7">
                      <div class="form-group">
                       <div class="col-lg-8 col-md-8 col-sm-1">
                        <div class="dropdown bootstrap-select show">
                          <select class="selectpicker"  data-style="select-with-transition" title="Select CEO" id="ceo"  name="ceo" required="required" value="<?= set_value('ceo')?>">

                            </select>
                            <span class="error_msg"><?php echo form_error('ceo'); ?></span>
                           </div>
                         </div>
                        </div>
                       </div>
                      </div> 

                      <div class="row">
                      <label class="col-sm-2 col-form-label">Select Branch <span class="error_msg">*</span></label>
                      <div class="col-sm-7">
                        <div class="form-group">
                         <div class="col-lg-8 col-md-8 col-sm-1">
                          <div class="dropdown bootstrap-select show">
                            <select class="selectpicker"  data-style="select-with-transition" title="Select Branch"  name="branch" required="required" value="<?= set_value('branch')?>">
                                   <?php
                                    foreach($branchList as $branch)
                                      { ?>
                                    <option value="<?= $branch['id'];?>"><?= $branch['branchName'];?></option>
                                  <?php } ?>
                                  </select>
                                   <span class="error_msg"><?php echo form_error('branch'); ?></span>
                             </div>
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
                    <a href="<?= base_url('branch-manager-list');?>" class="btn btn-primary pull-right" >Cancel</a>
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
                              html +='<option value="'+response[i]['id']+'">'+response[i]['name']+'</option>'
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
<script>
  // $(document).ready(function () { 
  //   var fewSeconds = 3;
  //   $("#submit").on('dblclick', function (event)
  //    { 
  //      $('#submit').text('please waite...');
  //      $('#submit').attr('disabled',true);
  //      setTimeout(function(){
  //       $('#submit').attr('disabled', false);
  //       $('#submit').text('Insert');
  //         }, fewSeconds*1000);
  //     });
  //    }); 
  
  </script>
