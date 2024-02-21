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
                      <div class="col-sm-8">
                        <div class="form-group">
                          <div id="locationField">
                             <input id="locality" class="form-control" placeholder="Enter Airport Name" onkeyup="initializeAutocomplete()" type="text" name="airportName" required="required"  />
                            </div>
                           <span class="error_msg"><?php echo form_error('airportName'); ?></span>
                        </div>
                      </div>
                    </div>

                    <input type="hidden" name="latitude" id="lat">
                    <input type="hidden" name="langitude" id="lang">

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
