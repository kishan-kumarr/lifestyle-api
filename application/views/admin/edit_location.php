 <div class="content">
        <div class="container-fluid">
          <div class="row">
               <div class="col-md-12">
              <form id="RangeValidation" class="form-horizontal" action="<?= base_url('update-location/'.$singleRecord['id']);?>" method="post">
                <div class="card ">
                  <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                      <h4 class="card-title">Update Location</h4>
                    </div>
                  </div>
                  <div class="card-body ">
                   
                  <div class="row">
                    <label class="col-sm-2 col-form-label">Location Name <span class="error_msg">*</span> </label>
                    <div class="col-sm-7">
                      <div class="form-group">
                        <div id="locationField">
                           <input id="autocomplete" class="form-control" placeholder="Enter your Location" onLoad="geolocate()" type="text" name="locationName" required="required" value="<?= $singleRecord['locationName'];?>"/>
                          </div>
                         <span class="error_msg"><?php echo form_error('locationName'); ?></span>
                      </div>
                    </div>
                  </div>
                   
                    <div class="row">
                      <label class="col-sm-2 col-form-label">City Name <span class="error_msg">*</span> </label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <input class="form-control" type="text" name="cityName"  required="required"  value="<?= $singleRecord['cityName'];?>" id="locality" value="<?= $singleRecord['cityName'];?>"/>
                           <span class="error_msg"><?php echo form_error('cityName'); ?></span>
                        </div>
                      </div>
                    </div> 

                     <div class="row">
                      <label class="col-sm-2 col-form-label">State Name <span class="error_msg">*</span> </label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <input class="form-control" type="text" name="stateName"  required="required"  value="<?= $singleRecord['stateName'];?>" id="administrative_area_level_1"  value="<?= $singleRecord['stateName'];?>"/>
                           <span class="error_msg"><?php echo form_error('stateName'); ?></span>
                        </div>
                      </div>
                    </div> 

                  
                   <div class="row">
                      <label class="col-sm-2 col-form-label">Country Name <span class="error_msg">*</span> </label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <input class="form-control" type="text" name="countryName"  required="required"  value="<?= $singleRecord['countryName'];?>" id="country"  value="<?= $singleRecord['countryName'];?>"/>
                           <span class="error_msg"><?php echo form_error('countryName'); ?></span>
                        </div>
                      </div>
                    </div> 
                    
                  </div>
                  <div class="card-footer ml-auto mr-auto">
                    <button type="submit" name="submit" id="submit" class="btn btn-rose">Update</button>
                    <a href="<?= base_url('location-list');?>" class="btn btn-primary pull-right" >Cancel</a>
                  </div>
                </div>
              </form>
            </div>
      </div>
    </div>
  </div>
