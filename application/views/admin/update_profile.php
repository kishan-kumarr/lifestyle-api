<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-rose card-header-icon">
           <div class="card-text">
              <h4 class="card-title">Update Profile</h4>
            </div>
          </div>
          <div class="card-body">
            <form method="post" action="<?= base_url('update-profile');?>">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Email Id</label>
                    <input type="email" class="form-control" name="email" required="required" value="<?= $data['email']; ?>">
                     <span class="error_msg"><?php echo form_error('email'); ?></span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
            <label class="bmd-label-floating">Password</label>
            <input type="password" class="form-control" name="password" required="required" value="<?= $data['normal_password'] ;?>">
             <span class="error_msg"><?php echo form_error('password'); ?></span>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-fill btn-rose pull-right" name="submit">
                Update Profile
                <div class="ripple-container">
                </div>
              </button>
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
