
   
 <div class="content">
        <div class="container-fluid">
          <div class="row">
               <div class="col-md-12">
              <form id="RangeValidation" class="form-horizontal" action="<?= base_url('add-location');?>" method="post">
                <div class="card ">
                  <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                      <h4 class="card-title">Add Location</h4>
                    </div>
                  </div>
                  <div class="card-body ">
                   
                  <div class="row">
                    <label class="col-sm-2 col-form-label">Location Name <span class="error_msg">*</span> </label>
                    <div class="col-sm-7">
                      <div class="form-group">
                        <div id="locationField">
                           <input id="autocomplete" class="form-control" placeholder="Enter your Location" onFocus="geolocate()" type="text" name="locationName" required="required"  />
                          </div>
                         <span class="error_msg"><?php echo form_error('locationName'); ?></span>
                      </div>
                    </div>
                  </div>
                   
                    <div class="row">
                      <label class="col-sm-2 col-form-label">City Name <span class="error_msg">*</span> </label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <input class="form-control" type="text" name="cityName"  required="required"  value="<?= set_value('cityName');?>" id="locality"  />
                           <span class="error_msg"><?php echo form_error('cityName'); ?></span>
                        </div>
                      </div>
                    </div> 

                    

                     <div class="row">
                      <label class="col-sm-2 col-form-label">State Name <span class="error_msg">*</span> </label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <input class="form-control" type="text" name="stateName"  required="required"  value="<?= set_value('stateName');?>" id="administrative_area_level_1" />
                           <span class="error_msg"><?php echo form_error('stateName'); ?></span>
                        </div>
                      </div>
                    </div> 

                   <div class="row">
                      <label class="col-sm-2 col-form-label">Country Name <span class="error_msg">*</span> </label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <input class="form-control" type="text" name="countryName"  required="required"  value="<?= set_value('countryName');?>" id="country" />
                           <span class="error_msg"><?php echo form_error('countryName'); ?></span>
                        </div>
                      </div>
                    </div> 
                    
                  </div>
                  <div class="card-footer ml-auto mr-auto">
                    <button type="submit" name="submit" id="submit" class="btn btn-rose">Insert</button>
                    <a href="<?= base_url('location-list');?>" class="btn btn-primary pull-right" >Cancel</a>
                  </div>
                </div>
              </form>
            </div>
        </div>
    </div>
  </div>


 
    

    

    
