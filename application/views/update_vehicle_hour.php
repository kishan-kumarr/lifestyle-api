<div class="content">
       <div class="container-fluid">
         <div class="row">
              <div class="col-md-12">
             <form id="RangeValidation" action="<?= base_url('update-vehicle-hour/'.$data['id'])?>" class="form-horizontal"  method="post">
               <div class="card ">
                 <div class="card-header card-header-rose card-header-text">
                   <div class="card-text">
                     <h4 class="card-title">Update Vehicle Hour</h4>
                   </div>
                 </div>
                 <div class="card-body">

                <div class="row">
                   <label class="col-sm-2 col-form-label">Time <span class="error_msg">*</span> </label>
                   <div class="col-sm-8">
                     <div class="form-group">
                       <div id="locationField">
                          <input  class="form-control" id="datetimepicker1" placeholder="Enter Time" value="<?= $data['hour'].':'.$data['minute']?>" onFocus="geolocate()" type="text" name="time" required="required" onkeypress="return isNumber(event)" />
                         </div>
                        <span class="error_msg"><?php echo form_error('time'); ?></span>
                     </div>
                   </div>
                 </div>

                 </div>
                 <div class="card-footer ml-auto mr-auto">
                   <button type="submit" name="submit" id="submit" value="submit" class="btn btn-rose">Update</button>
                   <a href="<?= base_url('vehicle-hour-list');?>" class="btn btn-primary pull-right" >Cancel</a>
                 </div>
               </div>
             </form>
           </div>
     </div>
   </div>
 </div>
