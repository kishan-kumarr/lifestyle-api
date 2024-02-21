 <div class="content">
        <div class="container-fluid">
          <div class="row">
               <div class="col-md-12">
              <form id="RangeValidation" class="form-horizontal" action="<?= base_url('update-vehicle/'.$singleRecord['id']);?>" method="post" enctype="multipart/form-data">
                <div class="card ">
                  <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                      <h4 class="card-title">Update Vehicle</h4>
                    </div>
                  </div>
                  <div class="card-body ">
                    <div class="row">
                      <label class="col-sm-2 col-form-label">Choose Image <span class="error_msg">*</span></label>
                      <div class="col-md-3 col-sm-4">
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                        <div class="fileinput-new thumbnail img-circle">
                        <img src="<?=base_url('assets/admin/resizeImage/');?><?php if($singleRecord['vehicleImage'] != ''){echo $singleRecord['vehicleImage'];} else {echo 'user.png';}?>" alt="..."> 
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                        <div>
                          <span class="btn btn-round btn-rose btn-file">
                            <span class="fileinput-new">Choose Image</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="file" name="vehicleImage"  value="<?= set_value('vehicleImage');?>"/>
                            <input type="hidden" name="hiddenImage" value="<?= $singleRecord['vehicleImage'];?>">
                          </span>
                           <span class="error_msg"> <?php echo form_error('vehicleImage'); ?></span>
                          <br />
                          <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                        </div>
                      </div>
                    </div>
                    </div>
                  
                    <div class="row">
                      <label class="col-sm-2 col-form-label">Vehicle Class  <span class="error_msg">*</span> </label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <input class="form-control" type="text" name="vehicleName"  required="required"  value="<?= $singleRecord['vehicleName'];?>"/>
                           <span class="error_msg"><?php echo form_error('vehicleName'); ?></span>
                        </div>
                      </div>
                    </div>
                     <div class="row">
                      <label class="col-sm-2 col-form-label">Max Passenger <span class="error_msg">*</span> </label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <input class="form-control" type="text" name="passenger"  required="required"  value="<?= $singleRecord['passenger'];?>" onkeypress="return isNumber(event)"/>
                           <span class="error_msg"><?php echo form_error('passenger'); ?></span>
                        </div>
                      </div>
                    </div>

                     <div class="row">
                      <label class="col-sm-2 col-form-label">Max Luggage  <span class="error_msg">*</span></label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <input class="form-control" type="text" required="required" name="luggage"   value="<?= $singleRecord['luggage'];?>" onkeypress="return isNumber(event)"/>
                           <span class="error_msg"><?php echo form_error('luggage'); ?></span>
                        </div>
                      </div>
                    </div>
                    
                    <div class="row">
                      <label class="col-sm-2 col-form-label">Price (per/km)<span class="error_msg">*</span> </label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <input class="form-control" type="text" name="price"  required="required"  value="<?= $singleRecord['price'];?>" onkeypress="return isNumber(event)"/>
                           <span class="error_msg"><?php echo form_error('price'); ?></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer ml-auto mr-auto">
                    <button type="submit" name="submit" id="submit" class="btn btn-rose">Update</button>
                    <a href="<?= base_url('vehicle-list');?>" class="btn btn-primary pull-right" >Cancel</a>
                  </div>
                </div>
              </form>
            </div>
      </div>
    </div>
  </div>