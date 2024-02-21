 <div class="content">
        <div class="container-fluid">
          <div class="row">
               <div class="col-md-12">
              <form id="RangeValidation" class="form-horizontal" action="<?= base_url('update-predefine-message/'.$singleRecord['id']);?>" method="post">
                <div class="card ">
                  <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                      <h4 class="card-title">Update Message</h4>
                    </div>
                  </div>
                  <div class="card-body ">

                    <div class="row">
                      <label class="col-sm-2 col-form-label">Message <span class="error_msg">*</span> </label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <input class="form-control" type="text" name="message"  required="required"  value="<?= $singleRecord['defaultMessage'];?>"/>
                           <span class="error_msg"><?php echo form_error('message'); ?></span>
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="card-footer ml-auto mr-auto">
                    <button type="submit" name="submit" id="submit" class="btn btn-rose">Update</button>
                    <a href="<?= base_url('manage-predefine-message');?>" class="btn btn-primary pull-right" >Cancel</a>
                  </div>
                </div>
              </form>
            </div>
      </div>
    </div>
  </div>
