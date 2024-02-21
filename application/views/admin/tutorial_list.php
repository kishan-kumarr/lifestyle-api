 <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">class</i>
                  </div> 
                  <h4 class="card-title">Toturial List</h4>
                </div>
                <div class="card-body">
                
                  <div class="toolbar">
               
                  </div>
                  <div class="material-datatables">
                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                      <thead>
                        <tr>
                          <th>Sr. No.</th>
                          <th>Tuturial Image </th>
                          <th>Tuturial Content</th>
                          <th class="disabled-sorting text-right">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $i = 1;
                          foreach($datas as $val) { 
                        ?>
                        <tr>
                          <td><?= $i;?></td>
                          <td><img src="<?= base_url('assets/admin/resizeImage/').$val['image']; ?>" style="width:150px;height:80px;"> </td>
                          <td><?= $val['description']; ?></td>
                       

                        <td class="td-actions text-right">
                         
                           <a href="<?= base_url('admin/ManageTutorial/changeStatus/').$val['id'].'/'.$val['status'];?>">
                              <?php 
                              if($val['status'] == '1'){ ?>
                              <button type="button" rel="tooltip" class="btn btn-success btn-round" data-original-title="" title="change status">
                              <i class="fa fa-unlock" aria-hidden="true"></i>
                              </button>
                            <?php } else { ?>
                              <button type="button" rel="tooltip" class="btn btn-danger btn-round" data-original-title="" title="change status">
                              <i class="fa fa-lock" aria-hidden="true"></i>
                              </button>
                            <?php } ?>
                           </a>

                           <a href="<?= base_url('update-tutorial/').$val['id'];?>">
                            <button type="button" rel="tooltip" class="btn btn-info btn-round" data-original-title="" title="update">
                              <i class="material-icons">edit</i>
                            <div class="ripple-container"></div></button>
                          </a>
                        
                          </td>
                        </tr>
                      

                       <?php $i++; } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- end content-->
              </div>
              <!--  end card  -->
            </div>
            <!-- end col-md-12 -->
          </div>
          <!-- end row -->
        </div>
      </div>

     