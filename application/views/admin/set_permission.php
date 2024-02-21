      <div class="content">
        <div class="container-fluid">
          <div class="row">
               <div class="col-md-12">
              <form id="RangeValidation" class="form-horizontal" action="<?= base_url('set-ceo-permission');?>" method="post">
                <div class="card ">
                  <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                      <h4 class="card-title">Set Permission</h4>
                    </div>
                  </div>
                  <div class="card-body ">
                  
                   <div class="row">
                    <label class="col-sm-2 col-form-label">Select <span class="error_msg">*</span></label>
                    <div class="col-sm-7">
                      <div class="form-group">
                       <div class="col-lg-6 col-md-6 col-sm-1">
                        <div class="dropdown bootstrap-select show">
                          <select class="selectpicker"  data-style="select-with-transition" title="Select"  name="role"  id="roleId" required="required">
                                 <!-- <?php
                                 // foreach($ceoList as $ceo)
                                    { ?>
                                  <option value="<?//= $ceo['id'];?>"><?//= $ceo['name'];?></option>
                                <?php } ?> -->
                                  <option value="2">CEO</option>
                                </select>
                              <span class="error_msg"><?php echo form_error('role'); ?></span>
                           </div>
                         </div>
                        </div>
                       </div>
                      </div>  

                      <div class="row">
                      <label class="col-sm-2 col-form-label">Menu List </label>
                      <div class="col-sm-7">
                        <div class="form-group" id="selectedMenu">
                             <?php
                              foreach($menuList as $menu) { ?>
                                  <div class="form-check">
                                    <label class="form-check-label">
                                         <input class="form-check-input" type="checkbox" value="<?= $menu['id'];?>" name="setMenuName[]" > <?= $menu['MenuName']?>
                                         <span class="form-check-sign">
                                        <span class="check"></span>
                                       </span>
                                    </label>
                                  </div>
                              <?php } ?>
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="card-footer ml-auto mr-auto">
                    <button type="submit" name="submit" id="submit" class="btn btn-rose">Update</button>
                    <a href="<?= base_url('dashboard');?>" class="btn btn-primary pull-right" >Cancel</a>
                  </div>
                </div>
              </form>
            </div>
      </div>
    </div>
  </div>


 <script>
    $(document).ready(function(){
      
     $('#roleId').on('change',function(){
       var roleId = $(this).val();
       var checked = '';
     
          $.ajax({    
                  type:'POST',  
                  url:'<?= base_url('admin/Manage_ceo/getSelectedMenuList');?>',  
                  data:{roleId:roleId},   
                  success:function(data)
                  {   
                    console.log(data);  
                    if(data.length != 0 )
                    {
                      //console.log(data);
                      obj = JSON.parse(data);
                       var html = '';
                       $.each(obj,function(key,value)
                        {
                         // alert(value.MenuName);
                        if(value.roleId == roleId)
                        {
                         checked = 'checked';
                        }
                        else
                        {
                          checked = '';
                        }
                          html+='<div class="form-check">';
                              html+='<label class="form-check-label">'
                                   html+='<input class="form-check-input" type="checkbox" value="'+value.id+'" name="setMenuName[]" '+checked+'> '+value.MenuName+' ';
                                   html+='<span class="form-check-sign">';
                                  html+='<span class="check"></span>';
                                 html+='</span>';
                              html+='</label>';
                            html+='</div>';
                       });
                        $('#selectedMenu').html(html);
                       }
                    }   
                  }); 
          });   
      });
  </script>