 <div class="content">
        <div class="container-fluid">
          <div class="row">
               <div class="col-md-12">
              <form id="RangeValidation" class="form-horizontal" action="<?= base_url('add-vehicle-colour');?>" method="post" enctype="multipart/form-data">
                <div class="card ">
                  <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                      <h4 class="card-title">Add Vehicle Colour</h4>
                    </div>
                  </div>
                  <div class="card-body ">
                   
                  
                    <div class="row">
                      <label class="col-sm-2 col-form-label">Vehicle Colour  <span class="error_msg">*</span> </label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <input class="form-control" type="text" name="vehicleColour"  required="required"  value="<?= set_value('vehicleColour');?>"/>
                           <span class="error_msg"><?php echo form_error('vehicleColour'); ?></span>
                        </div>
                      </div>
                    </div>
                  
                  <div class="card-footer ml-auto mr-auto">
                    <button type="submit" name="submit" id="submit" class="btn btn-rose">Insert</button>
                    <a href="<?= base_url('vehicle-colour');?>" class="btn btn-primary pull-right" >Cancel</a>
                  </div>
                </div>
              </form>
            </div>
      </div>
    </div>
  </div>