 <div class="content">
        <div class="container-fluid">
          <div class="row">
               <div class="col-md-12">
              <form id="RangeValidation" class="form-horizontal" action="<?= base_url('update-state/'.$singleRecord['id']);?>" method="post">
                <div class="card ">
                  <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                      <h4 class="card-title">Update State</h4>
                    </div>
                  </div>
                  <div class="card-body ">
                   
                   <div class="row">
                    <label class="col-sm-2 col-form-label">Select Country <span class="error_msg">*</span></label>
                    <div class="col-sm-7">
                      <div class="form-group">
                       <div class="col-lg-6 col-md-6 col-sm-1">
                        <div class="dropdown bootstrap-select show">
                          <select class="selectpicker"  data-style="select-with-transition" title="Select Country"  name="countryId" required="required" value="<?= set_value('countryId')?>">
                                 <?php
                                  foreach($countryList as $country)
                                    { ?>
                                  <option value="<?= $country['id'];?>" <?php if($singleRecord['countryId'] == $country['id']){ echo 'selected'; } ?>><?= $country['countryName'];?></option>
                                <?php } ?>
                                </select>
                                 <span class="error_msg"><?php echo form_error('countryId'); ?></span>
                           </div>
                         </div>
                        </div>
                       </div>
                      </div>  


                    <div class="row">
                      <label class="col-sm-2 col-form-label">State Name <span class="error_msg">*</span> </label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <input class="form-control" type="text" name="stateName"  required="required"  value="<?= $singleRecord['stateName'];?>"/>
                           <span class="error_msg"><?php echo form_error('stateName'); ?></span>
                        </div>
                      </div>
                    </div>
                    
                  </div>
                  <div class="card-footer ml-auto mr-auto">
                    <button type="submit" name="submit" id="submit" class="btn btn-rose">Update</button>
                    <a href="<?= base_url('state-list');?>" class="btn btn-primary pull-right" >Cancel</a>
                  </div>
                </div>
              </form>
            </div>
      </div>
    </div>
  </div>
