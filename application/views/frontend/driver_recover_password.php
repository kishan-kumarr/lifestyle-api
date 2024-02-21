<section class="login-form">
   <div class="container-fluid">
      <div class="row">
         <div class="offset-3 col-md-6">
            <form action="<?= base_url('driver-password-recover/'.$randCode);?>" method="post">
               <div class="row form-group">
                  <div class="col-md-12">
                     <label>Password</label>
                     <input type="password" minlength="6" maxlength="15" name="password" required="required" class="form-control">
                     <span class="error_msg"><?= form_error('password');?></span>
                  </div>
                   <div class="col-md-12">
                     <label>Confirm Password</label>
                     <input type="password" minlength="6" maxlength="15" name="confirm_password" required="required" class="form-control">
                     <span class="error_msg"><?= form_error('confirm_password');?></span>
                  </div>
               </div>
               <div class="form-group">
                   <input type="submit" name="submit" value="Submit" class="btn btn-info">
               </div>
            </form>
         </div>
      </div>
   </div>
</section>