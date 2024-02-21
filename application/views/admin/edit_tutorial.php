 <div class="content">
        <div class="container-fluid">
          <div class="row">
               <div class="col-md-12">
              <form id="RangeValidation" class="form-horizontal"  method="post" enctype="multipart/form-data">
                <div class="card ">
                  <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                      <h4 class="card-title">Update Tutorial</h4>
                    </div>
                  </div>
                  <div class="card-body ">
                    <div class="row">
                      <label class="col-sm-2 col-form-label">Choose Image <span class="error_msg">*</span></label>
                      <div class="col-md-3 col-sm-4">
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                        <div class="fileinput-new thumbnail img-circle">
                        <img src="<?=base_url('assets/admin/resizeImage/');?><?php if($singleRecord['image'] != ''){echo $singleRecord['image'];} else {echo 'user.png';}?>" alt="..."> 
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                        <div>
                          <span class="btn btn-round btn-rose btn-file">
                            <span class="fileinput-new">Choose Image</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="file" name="image" />
                            <input type="hidden" name="hiddenImage" value="<?= $singleRecord['image'];?>">
                          </span>
                           <span class="error_msg"> <?php echo form_error('image'); ?></span>
                          <br />
                          <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                        </div>
                      </div>
                    </div>
                    </div>
                  
                    <div class="row">
                      <label class="col-sm-2 col-form-label">Tutorial Content  <span class="error_msg">*</span> </label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <input class="form-control" type="text" name="description"  required="required"  value="<?= $singleRecord['description'];?>"/>
                           <span class="error_msg"><?php echo form_error('description'); ?></span>
                        </div>
                      </div>
                    </div>
                    
                    
                  </div>
                  <div class="card-footer ml-auto mr-auto">

                    <button type="submit" value="submit" name="submit" id="submit" class="btn btn-rose">Update</button>
                    <a href="<?= base_url('manage-user-tutorial');?>" class="btn btn-primary pull-right" >Cancel</a>
                  </div>
                </div>
              </form>
            </div>
      </div>
    </div>
  </div>