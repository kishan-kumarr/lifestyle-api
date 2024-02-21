 <div class="content">
        <div class="container-fluid">
          <div class="row">
               <div class="col-md-12">
              <form id="RangeValidation" class="form-horizontal" action="<?= base_url('update-airport/'.$singleRecord['id']);?>" method="post">
                <div class="card ">
                  <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                      <h4 class="card-title">Update Airport</h4>
                    </div>
                  </div>
                  <div class="card-body ">
                   <?php //echo "<pre>";print_r($singleRecord);exit;?>
                   <div class="row">
                      <label class="col-sm-2 col-form-label">Airport Name <span class="error_msg">*</span> </label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <input class="form-control" type="text" name="airportName"  required="required"  value="<?= $singleRecord['airportName'];?>"/>
                           <span class="error_msg"><?php echo form_error('airportName'); ?></span>
                        </div>
                      </div>
                    </div>



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
                        <select class="form-control"  data-style="select-with-transition" title="Select State"  name="stateId" required="required" value="<?//= set_value('stateId')?>" id="stateId">
                                <?php
                                  foreach($stateList as $state)
                                    { ?>
                                  <option value="<?= $state['id'];?>" <?php if($singleRecord['stateId'] == $state['id']) { echo 'selected';}?>><?= $state['stateName'];?></option>
                                <?php } ?>
                            </select>
                                <span class="error_msg"><?php echo form_error('stateId'); ?></span>
                       <!--  <div class="dropdown bootstrap-select show">
                          
                           </div> -->
                         </div>
                        </div>
                       </div>
                      </div>  


                  <div class="row">
                    <label class="col-sm-2 col-form-label">Select City <span class="error_msg">*</span></label>
                    <div class="col-sm-7">
                      <div class="form-group">
                       <div class="col-lg-6 col-md-6 col-sm-1">
                         <input type="hidden" id="cId" value="<?= $singleRecord['cityId'];?>">
                        <select class="form-control"  data-style="select-with-transition" title="Select State"  name="cityId" required="required" value="<?//= set_value('stateId')?>" id="cityId">
                            </select>
                                <span class="error_msg"><?php echo form_error('cityId'); ?></span>
                       <!--  <div class="dropdown bootstrap-select show">
                          
                           </div> -->
                         </div>
                        </div>
                       </div>
                      </div>  
                  

                   <div class="row">
                      <label class="col-sm-2 col-form-label">Area Name <span class="error_msg">*</span> </label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <input class="form-control" type="text" name="areaName"  required="required"  value="<?= $singleRecord['areaName'];?>"/>
                           <span class="error_msg"><?php echo form_error('areaName'); ?></span>
                        </div>
                      </div>
                    </div>
                    
                  </div>
                  <div class="card-footer ml-auto mr-auto">
                    <button type="submit" name="submit" id="submit" class="btn btn-rose">Update</button>
                    <a href="<?= base_url('airport-list');?>" class="btn btn-primary pull-right" >Cancel</a>
                  </div>
                </div>
              </form>
            </div>
      </div>
    </div>
  </div>


 <script>
  //on page load getting state list according to selected county
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
  
     //on page load getting city list according to selected state
      var stateId = $('#stateId').val();
      var cId = $('#cId').val();
          $.ajax({    
                  type:'POST',  
                  url:'<?= base_url('admin/Manage_airport/getCityBasedOnState');?>',  
                  data:{stateId:stateId},   
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
                          if(cId == value.id)
                          {
                            var select = 'selected';
                          }
                          else 
                          {
                            var select = '';
                          }
                          html+=' <option value="'+value.id+'" '+select+'>'+value.cityName+'</option>';
                           });
                        $('#cityId').html(html);
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
                          html+=' <option value="'+value.id+'">'+value.stateName+'</option>';
                           });
                        $('#stateId').html(html);
                        $('#cityId').html('');
                        $('.selectpicker').selectpicker('refresh');
                       }
                    }   
                  }); 
          });  

           // getting city list on state chane 
      $('#stateId').on('change',function()
        {
        var stateId = $(this).val();
          $.ajax({    
                  type:'POST',  
                  url:'<?= base_url('admin/Manage_airport/getCityBasedOnState');?>',  
                  data:{stateId:stateId},   
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
                          html+=' <option value="'+value.id+'">'+value.cityName+'</option>';
                           });
                        $('#cityId').html(html);
                        $('.selectpicker').selectpicker('refresh');
                       }
                    }   
                  }); 
           }); 
      });
  </script>