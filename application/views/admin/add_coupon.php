 <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <form id="RangeValidation" class="form-horizontal" action="<?=base_url('add-coupon');?>" method="post">
                <div class="card ">
                  <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                      <h4 class="card-title">Add Coupon</h4>
                    </div>
                  </div>
                  <div class="card-body ">

                    <div class="row">
                      <label class="col-sm-2 col-form-label">From <span class="error_msg">*</span> </label>
                      <div class="col-sm-7">
                        <div class="row form-group form-md-line-input form-md-floating-label">
                             <input type="text" class="form-control" value="<?php echo set_value('validFrom');?>" autocomplete="off" name="validFrom" id="dt1" readonly required>
                            <span class="error_msg"><?php echo form_error('validFrom');?></span>
                        </div>
                      </div>
                    </div>

                     <div class="row">
                      <label class="col-sm-2 col-form-label">To <span class="error_msg">*</span> </label>
                      <div class="col-sm-7">
                        <div class="row form-group form-md-line-input form-md-floating-label">
                             <input type="text" class="form-control" value="<?php echo set_value('validTo');?>" autocomplete="off" name="validTo" id="dt2" readonly required>
                          <span class="error_msg"><?php echo form_error('validTo');?></span>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <label class="col-sm-2 col-form-label">Discount Code <span class="error_msg">*</span> </label>
                        <div class="form-group" style="position: relative;">
                          <input type="text" class="form-control" name="code" value="<?=set_value('code');?>" required/>
                            <div style="position: absolute; right:0px; top:6px;">
                              <input type="hidden" data-toggle="tooltip" title="Set length of code" data-placement="top" class="codeLength" style="border: 1px solid #dadada;float: left;height: 20px; margin-right: 4px; text-align: center; margin-top: 1px; width: 20px;">
                             <a href="javascript:void(0);" onclick="generateDiscountCode()" class="btn btn-xs btn-primary generta-btn">Generate</a>
                         </div>
                         <span class="error_msg"><?php echo form_error('code');?></span>
                      </div>
                    </div>

                    <div class="row">
                      <label class="col-sm-2 col-form-label">Value in (%) <span class="error_msg">*</span></label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <input class="form-control" type="text" name="value" required="required"  value="<?=set_value('value');?>" onkeypress="return isNumber(event)" maxlength="2"/>
                            <span class="error_msg"><?php echo form_error('value');?></span>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <label class="col-sm-2 col-form-label">Number of Times <span class="error_msg">*</span></label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <input class="form-control" type="text" name="no_of_times" required="required"  value="<?=set_value('no_of_times');?>" onkeypress="return isNumber(event)" maxlength="3"/>
                            <span class="error_msg"><?php echo form_error('no_of_times');?></span>
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="card-footer ml-auto mr-auto">
                    <button type="submit" name="submit" id="submit" class="btn btn-rose">Insert</button>
                    <a href="<?=base_url('coupon-list');?>" class="btn btn-primary pull-right" >Cancel</a>
                  </div>
                </div>
              </form>
            </div>
      </div>
    </div>
  </div>

  <script>
    function generateDiscountCode()
    {
      var length = 8;
      if (length < 8 || length == '')
       {
        alert('Too short discount code!');
       }
       else
        {
          var text = "";
          var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
          for (var i = 0; i < length; i++)
           {
           text += possible.charAt(Math.floor(Math.random() * possible.length));
           }
          $('[name="code"]').val(text.toUpperCase());
        }
   }

   $(document).ready(function(){
     $("#dt1").datepicker({
              dateFormat: "dd-mm-yy",
              minDate: 0,
              onSelect: function ()
               {
                  var dt2 = $('#dt2');
                  var startDate = $(this).datepicker('getDate');
                  var minDate = $(this).datepicker('getDate');
                  var dt2Date = dt2.datepicker('getDate');
                  //difference in days. 86400 seconds in day, 1000 ms in second
                  var dateDiff = (dt2Date - minDate)/(86400 * 1000);

                  startDate.setDate(startDate.getDate() + 30);
                  if (dt2Date == null || dateDiff < 0)
                    {
                        dt2.datepicker('setDate', minDate);
                    }
                    else if (dateDiff > 30){
                        dt2.datepicker('setDate', startDate);
                    }
                    //sets dt2 maxDate to the last day of 30 days window
                    dt2.datepicker('option', 'maxDate', startDate);
                    dt2.datepicker('option', 'minDate', minDate);
              }
          });
          $('#dt2').datepicker({
              dateFormat: "dd-mm-yy",
              minDate: 0
          });
     });
</script>
