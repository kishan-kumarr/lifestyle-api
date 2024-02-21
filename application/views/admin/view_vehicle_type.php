 <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">drive_eta</i>
                  </div>
                  <h4 class="card-title">Vehicle Type List</h4>
                </div>
                <div class="card-body">
                    <a href="<?= base_url('add-vehicle-type');?>" class="btn btn-rose pull-right" >Add Vehicle Type</a>
                  <div class="toolbar">
               <!-- Dependent filter -->
                     <div class="table-responsive">
                      <table cellpadding="7" width="100%">
                            <tr>
                               <td id="filter_col0" data-column="2">
                                <input type="text" class="form-control column_filter" id="col2_filter" placeholder="Vehicle Type">
                                </td>
                            </tr>
                      </table>
                    </div>
                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                  </div>
                  <div class="material-datatables">
                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                      <thead>
                        <tr>
                          <th>Sr. No.</th>
                          <th>Vehicle Image</th>
                          <th>Vehicle Type</th>
                          <th>Max Child</th>
                          <th>Max Person</th>
                          <th>Max Luggage</th>
                          <th>Date</th>
                          <th class="disabled-sorting text-right">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $i = 1;
                          foreach($vehicleData as $val) {
                        ?>
                        <tr>
                          <td><?= $i;?></td>
                          <td><img src="<?= base_url('assets/admin/resizeImage/').$val['vehicleImage']?>" style="width: 100px; height: 50px;"></td>
                          <td><?= $val['vehicleType']; ?></td>
                          <td><?= $val['childSeatAvailable']; ?></td>
                          <td><?= $val['maximumPerson']; ?></td>
                          <td><?= $val['maximumLuggage']; ?></td>
                          <td><?= $val['created']; ?></td>
                            <td class="td-actions text-right">
                             <a href="<?= base_url('admin/Manage_vehicleType/changeStatus/').$val['id'];?>">
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


                           <a href="<?= base_url('update-vehicle-type/').$val['id'];?>">
                            <button type="button" rel="tooltip" class="btn btn-info btn-round" data-original-title="" title="update">
                              <i class="material-icons">edit</i>
                            <div class="ripple-container"></div></button>
                          </a>

                         <a>
                            <button type="button" rel="tooltip" class="btn btn-danger btn-round" data-original-title="" title="delete" data-toggle="modal" data-target="#deleteModal<?= $val['id'] ; ?>">
                              <i class="material-icons">close</i>
                            </button>
                          </a>
                          </td>
                        </tr>


                    <!-- Delete modal begain-->
                    <div id="deleteModal<?= $val['id'] ; ?>" class="modal fade">
                       <div class="modal-dialog">
                        <div class="modal-content">
                          <!-- dialog body -->
                          <div class="modal-body">
                             <button type="button" class="close" data-dismiss="modal">&times;</button>
                             Are You Sure to  Delete
                          </div>
                          <!-- dialog buttons -->
                          <div class="modal-footer"><button type="button" class="btn btn-danger"  onclick="window.location.href='<?php echo base_url('admin/Manage_vehicleType/deleteVehicleType/'.$val['id']);?>';">Confirm</button> &nbsp;&nbsp;<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                       </div>
                     </div>
                    <!-- Delete Model End-->

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
