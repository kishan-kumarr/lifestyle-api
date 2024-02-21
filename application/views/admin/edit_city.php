 <div class="content">
        <div class="container-fluid">
          <div class="row">
               <div class="col-md-12">
              <form id="RangeValidation" class="form-horizontal" action="<?= base_url('update-city/'.$singleRecord['id']);?>" method="post">
                <div class="card ">
                  <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                      <h4 class="card-title">Update City</h4>
                    </div>
                  </div>
                  <div class="card-body ">
                   
                   <div class="row">
                    <label class="col-sm-2 col-form-label">Select Country <span class="error_msg">*</span></label>
                    <div class="col-sm-7">
                      <div class="form-group">
                       <div class="col-lg-6 col-md-6 col-sm-1">
                        
                          <select class="form-control"  data-style="select-with-transition" title="Select Country"  name="countryId" required="required" value="<?//= set_value('countryId')?>" id="countryId">
                                 <?php
                                  foreach($coutnryList as $country)
                                    { ?>
                                  <option value="<?= $country['id'];?>" <?php if($singleRecord['countryId'] == $country['id']) { echo 'selected';}?>><?= $country['countryName'];?></option>
                                <?php } ?>
                                </select>
                                 <span class="error_msg"><?php echo form_error('countryId'); ?></span>
                          
                         </div>
                        </div>
                       </div>
                      </div>  


                      <div class="row">
                    <label class="col-sm-2 col-form-label">Select State <span class="error_msg">*</span></label>
                    <div class="col-sm-7">
                      <div class="form-group">
                       <div class="col-lg-6 col-md-6 col-sm-1">
                        <input type="hidden" id="sId" value="<?= $singleRecord['stateId'];?>">
                        <select class="form-control"  data-style="select-with-transition" title="Select State"  name="stateId" required="required" value="<?= set_value('stateId')?>" id="stateId">
                            </select>
                                <span class="error_msg"><?php echo form_error('stateId'); ?></span>
                       <!--  <div class="dropdown bootstrap-select show">
                          
                           </div> -->
                         </div>
                        </div>
                       </div>
                      </div>  
                  

                    <div class="row">
                      <label class="col-sm-2 col-form-label">City Name <span class="error_msg">*</span> </label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <input class="form-control" type="text" name="cityName"  required="required"  value="<?= $singleRecord['cityName'];?>"/>
                           <span class="error_msg"><?php echo form_error('cityName'); ?></span>
                        </div>
                      </div>
                    </div>
                    
                  </div>
                  <div class="card-footer ml-auto mr-auto">
                    <button type="submit" name="submit" id="submit" class="btn btn-rose">Update</button>
                    <a href="<?= base_url('city-list');?>" class="btn btn-primary pull-right" >Cancel</a>
                  </div>
                </div>
              </form>
            </div>
      </div>
    </div>
  </div>


 <script>
     var countryId = $('#countryId').val();
     var sId       = $('#sId').val();
          $.ajax({    
                  type:'POST',  
                  url:'<?= base_url('admin/Manage_city/getStateBasedOnCountry');?>',  
                  data:{countryId:countryId},   
                  success:function(data)
                  {   
                    console.log(data);  
                    if(data.length != 0 )
                    {
                      //console.log(data);
                      obj = JSON.parse(data);
                       var html = '';
                       $.each(obj,function(key,value)
                        {
                          //alert(value.stateName);
                          if(sId == value.id)
                          {
                            var select = 'selected';
                          }
                          else 
                          {
                            var select = '';
                          }
                          html+=' <option value="'+value.id+'" '+select+'>'+value.stateName+'</option>';
                           });
                        $('#stateId').html(html);
                        $('.selectpicker').selectpicker('refresh');
                       }
                    }   
                  }); 
  

    $(document).ready(function(){
     $('#countryId').on('change',function(){
       var countryId = $(this).val();
       
          $.ajax({    
                  type:'POST',  
                  url:'<?= base_url('admin/Manage_city/getStateBasedOnCountry');?>',  
                  data:{countryId:countryId},   
                  success:function(data)
                  {   
                    console.log(data);  
                    if(data.length != 0 )
                    {
                      //console.log(data);
                      obj = JSON.parse(data);
                       var html = '';
                       $.each(obj,function(key,value)
                        {
                          //alert(value.stateName);
                          html+=' <option value="'+value.id+'" >'+value.stateName+'</option>';
                           });
                        $('#stateId').html(html);
                        $('.selectpicker').selectpicker('refresh');
                       }
                    }   
                  }); 
          });   
      });
  </script>