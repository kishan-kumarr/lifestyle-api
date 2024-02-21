     <div class="content">
        <div class="container-fluid">
          <div class="row">
               <div class="col-md-12">
              <form id="RangeValidation" class="form-horizontal" action="<?= base_url('add-price');?>" method="post">
                <div class="card ">
                  <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                      <h4 class="card-title">Add Price Setting</h4>
                    </div>
                  </div>
                  <div class="card-body ">
                   
                 <div class="row">
                  <label class="col-sm-2 col-form-label">Select Vehicle Type <span class="error_msg">*</span></label>
                  <div class="col-sm-7">
                    <div class="form-group">
                     <div class="col-lg-6 col-md-6 col-sm-1">
                        <select class="form-control" title="Select Vehicle Type"  name="vehicleType" required="required">
                               <?php
                                foreach($vehicleTypeList as $type)
                                  { ?>
                                <option value="<?= $type['id'];?>"><?= $type['vehicleType'];?></option>
                              <?php } ?>
                              </select>
                          <br><br> <span class="error_msg"><?php echo form_error('vehicleType'); ?></span>
                       </div>
                      </div>
                     </div>
                    </div>  

                  <div class="row">
                    <label class="col-sm-2 col-form-label">Price (Per Km) <span class="error_msg">*</span> </label>
                    <div class="col-sm-7">
                      <div class="form-group">
                           <input class="form-control" type="text" name="normalPrice" required="required" value="<?= set_value('normalPrice');?>" onkeypress="return isNumberKey(event)" />
                         <span class="error_msg"><?php echo form_error('normalPrice'); ?></span>
                      </div>
                    </div>
                  </div>
                   
                    <div class="row">
                      <label class="col-sm-2 col-form-label">Mid Night Charge (per Km) <span class="error_msg">*</span> </label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <input class="form-control" type="text" name="midNightCharge"  required="required"  value="<?= set_value('midNightCharge');?>" id="midNightCharge"  onkeypress="return isNumberKey(event)"/>
                           <span class="error_msg"><?php echo form_error('midNightCharge'); ?></span>
                        </div>
                      </div>
                    </div> 

                    

                     <div class="row">
                      <label class="col-sm-2 col-form-label">Child Charge (per child) <span class="error_msg">*</span> </label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <input class="form-control" type="text" name="childCharge"  required="required"  value="<?= set_value('childCharge');?>" id="childCharge" onkeypress="return isNumberKey(event)"/>
                           <span class="error_msg"><?php echo form_error('childCharge'); ?></span>
                        </div>
                      </div>
                    </div> 

                    <div class="row">
                      <label class="col-sm-2 col-form-label">Additional Stop Charge <span class="error_msg">*</span> </label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <input class="form-control" type="text" name="additionalStop"  required="required"  value="<?= set_value('additionalStop');?>" id="additionalStop" onkeypress="return isNumberKey(event)"/>
                           <span class="error_msg"><?php echo form_error('additionalStop'); ?></span>
                        </div>
                      </div>
                    </div> 


                      <div class="row">
                      <label class="col-sm-2 col-form-label">Additional Waiting Charge (per minute)<span class="error_msg">*</span> </label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <input class="form-control" type="text" name="additionalWaitingTime"  required="required"  value="<?= set_value('additionalWaitingTime');?>" id="additionalWaitingTime" onkeypress="return isNumberKey(event)"/>
                           <span class="error_msg"><?php echo form_error('additionalWaitingTime'); ?></span>
                        </div>
                      </div>
                    </div> 

                      <div class="row">
                      <label class="col-sm-2 col-form-label">Additional Kilometer Charge (per Km)<span class="error_msg">*</span> </label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <input class="form-control" type="text" name="additionalKelometer"  required="required"  value="<?= set_value('additionalKelometer');?>" id="additionalKelometer" onkeypress="return isNumberKey(event)"/>
                           <span class="error_msg"><?php echo form_error('additionalKelometer'); ?></span>
                        </div>
                      </div>
                    </div> 

                     <div class="row">
                      <label class="col-sm-2 col-form-label">User Cancellation Charge (in %)<span class="error_msg">*</span> </label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <input class="form-control" type="text" name="userCancellationCharge"  required="required"  value="<?= set_value('userCancellationCharge');?>" id="userCancellationCharge" onkeypress="return isNumberKey(event)"/>
                           <span class="error_msg"><?php echo form_error('userCancellationCharge'); ?></span>
                        </div>
                      </div>
                    </div> 

                      <div class="row">
                      <label class="col-sm-2 col-form-label">Driver Cancellation Charge (in %)<span class="error_msg">*</span> </label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <input class="form-control" type="text" name="driverCancellationCharge"  required="required"  value="<?= set_value('driverCancellationCharge');?>" id="driverCancellationCharge" onkeypress="return isNumberKey(event)"/>
                           <span class="error_msg"><?php echo form_error('driverCancellationCharge'); ?></span>
                        </div>
                      </div>
                    </div> 
                    
                  </div>
                  <div class="card-footer ml-auto mr-auto">
                    <button type="submit" name="submit" id="submit" class="btn btn-rose">Insert</button>
                    <a href="<?= base_url('price-list');?>" class="btn btn-primary pull-right" >Cancel</a>
                  </div>
                </div>
              </form>
            </div>
        </div>
    </div>
  </div>


 
    

    

    
