 <div class="content">
        <div class="container-fluid">
          <div class="row">
               <div class="col-md-12">
              <form id="RangeValidation" class="form-horizontal" action="<?= base_url('add-airport');?>" method="post">
                <div class="card ">
                  <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                      <h4 class="card-title">Add Airport</h4>
                    </div>
                  </div>
                  <div class="card-body ">
                  
                  <div class="row">
                      <label class="col-sm-2 col-form-label">Airport Name <span class="error_msg">*</span> </label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <input class="form-control" type="text" name="airportName"  required="required"  value="<?= set_value('airportName');?>"/>
                           <span class="error_msg"><?php echo form_error('airportName'); ?></span>
                        </div>
                      </div>
                    </div>


                   <div class="row">
                    <label class="col-sm-2 col-form-label">Select Country <span class="error_msg">*</span></label>
                    <div class="col-sm-7">
                      <div class="form-group">
                       <div class="col-lg-6 col-md-6 col-sm-1">
                        <div class="dropdown bootstrap-select show">
                          <select class="selectpicker"  data-style="select-with-transition" title="Select Country"  name="countryId" required="required" value="<?= set_value('countryId')?>" id="countryId">
                                 <?php
                                  foreach($coutnryList as $country)
                                    { ?>
                                  <option value="<?= $country['id'];?>"><?= $country['countryName'];?></option>
                                <?php } ?>
                                </select>
                                 <span class="error_msg"><?php echo form_error('countryId'); ?></span>
                           </div>
                         </div>
                        </div>
                       </div>
                      </div>  


                    <div class="row">
                    <label class="col-sm-2 col-form-label">Select State <span class="error_msg">*</span></label>
                    <div class="col-sm-7">
                      <div class="form-group">
                       <div class="col-lg-6 col-md-6 col-sm-1">
                        <div class="dropdown bootstrap-select show">
                          <select class="selectpicker"  data-style="select-with-transition" title="Select State"  name="stateId" required="required" value="<?= set_value('stateId')?>" id="stateId">
                               </select>
                                <span class="error_msg"><?php echo form_error('stateId'); ?></span>
                           </div>
                         </div>
                        </div>
                       </div>
                      </div>  

                    <div class="row">
                    <label class="col-sm-2 col-form-label">Select City <span class="error_msg">*</span></label>
                    <div class="col-sm-7">
                      <div class="form-group">
                       <div class="col-lg-6 col-md-6 col-sm-1">
                        <div class="dropdown bootstrap-select show">
                          <select class="selectpicker"  data-style="select-with-transition" title="Select City"  name="cityId" required="required" value="<?= set_value('cityId')?>" id="cityId">
                               </select>
                                <span class="error_msg"><?php echo form_error('cityId'); ?></span>
                           </div>
                         </div>
                        </div>
                       </div>
                      </div>  
                  

                    <div class="row">
                      <label class="col-sm-2 col-form-label">Area Name <span class="error_msg">*</span> </label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <input class="form-control" type="text" name="areaName"  required="required"  value="<?= set_value('areaName');?>"/>
                           <span class="error_msg"><?php echo form_error('areaName'); ?></span>
                        </div>
                      </div>
                    </div>
                    
                  </div>
                  <div class="card-footer ml-auto mr-auto">
                    <button type="submit" name="submit" id="submit" class="btn btn-rose">Insert</button>
                    <a href="<?= base_url('airport-list');?>" class="btn btn-primary pull-right" >Cancel</a>
                  </div>
                </div>
              </form>
            </div>
      </div>
    </div>
  </div>


 <script>
    $(document).ready(function()
    {
      $('#countryId').on('change',function()
      {
        var countryId = $(this).val();
          $.ajax({    
                  type:'POST',  
                  url:'<?= base_url('admin/Manage_airport/getStateBasedOnCountry');?>',  
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
                        $('#cityId').html(''); // empty city list
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