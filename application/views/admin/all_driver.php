 <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">account_box</i>
                  </div>
                  <h4 class="card-title">Driver List</h4>
                </div>
                <div class="card-body">
                    <a href="<?= base_url('add-driver');?>" class="btn btn-rose pull-right" >Add Driver</a>
                  <div class="toolbar">
               <!-- Dependent filter -->
                     <div class="table-responsive">
                      <table cellpadding="7" width="100%">
                            <tr>
                               <td id="filter_col0" data-column="1">
                                  <input type="text" class="form-control column_filter" id="col1_filter" placeholder="Name">
                                </td>
                                 <td id="filter_col1" data-column="2">
                                  <input type="text" class="form-control column_filter" id="col2_filter" placeholder="Email">
                                </td>
                                 <td id="filter_col2" data-column="3">
                                  <input type="text" class="form-control column_filter" id="col3_filter" placeholder="Mobile No.">
                                </td>
                                 <td id="filter_col3" data-column="4">
                                  <input type="text" class="form-control column_filter" id="col4_filter" placeholder="Location">
                                </td>
                                <td id="filter_col4" data-column="5">
                                  <input type="text" class="form-control column_filter" id="col5_filter" placeholder="CEO Name">
                                </td>
                                <td id="filter_col5" data-column="7">
                                  <input type="text" class="form-control column_filter" id="col7_filter" placeholder="Branch Manager Name">
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
                          <th>Name</th>
                          <th>Email</th>
                          <th>Mobile</th>
                          <th>Location</th>
                          <th>CEO</th>
                          <th>Branch Name</th>
                          <th>Branch Manager Name</th>
                         <!--  <th>Date</th> -->
                          <th>View</th>
                          <th class="disabled-sorting text-right">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $i = 1;
                          foreach($driverList as $val) {
                         ?>
                        <tr>
                          <td><?= $i;?></td>
                          <td><?= ucfirst($val['firstName'].' '.$val['lastName']); ?></td>
                          <td><?= $val['email']; ?></td>
                          <td><?= $val['mobile']; ?></td>
                          <td><?= $val['locationName']; ?></td>
                          <td><?= ucfirst($val['ceoName']); ?></td>
                          <td><?= $val['branchNames']; ?></td>
                          <td><?= ucfirst($val['branchManagerName']); ?></td>
                         <!--  <td><?//= $val['created']; ?></td> -->
                         <td class="td-actions text-right">
                            <a href="<?= base_url('view-driver/').$val['id'];?>">
                              <button type="button" rel="tooltip" class="btn btn-rose btn-round" data-original-title="" title="view">
                              <i class="fa fa-eye" aria-hidden="true"></i>
                              </button>
                            </a>
                          </td>
                            <td class="td-actions text-right">
                              <a href="<?= base_url('admin/Manage_driver/changeStatus/').$val['id'];?>">
                              <?php
                              if($val['status'] == '1'){ ?>
                              <button type="button" rel="tooltip" class="btn btn-success btn-round" data-original-title="" title="change-status" >
                              <i class="fa fa-unlock" aria-hidden="true"></i>
                              </button>
                            <?php } else if($val['status'] == '2') { ?>
                              <button type="button" rel="tooltip" class="btn btn-warning btn-round" data-original-title="" title="approved by branch manager">
                              <i class="fa fa-unlock" aria-hidden="true"></i>
                              </button>
                            <?php } else if($val['status'] == '3') { ?>
                                 <button type="button" rel="tooltip" class="btn btn-primary btn-round" data-original-title="" title="disapproved by branch manager">
                                 <i class="fa fa-lock" aria-hidden="true"></i>
                              </button>
                            <?php } else { ?>
                                 <button type="button" rel="tooltip" class="btn btn-danger btn-round" data-original-title="" title="change-status">
                                 <i class="fa fa-lock" aria-hidden="true"></i>
                              </button>
                            <?php } ?>
                           </a>


                           <a href="<?= base_url('update-driver/').$val['id'];?>">
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
                          <div class="modal-footer"><button type="button" class="btn btn-danger"  onclick="window.location.href='<?php echo base_url('admin/Manage_driver/deleteDriver/'.$val['id']);?>';">Confirm</button> &nbsp;&nbsp;<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
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
