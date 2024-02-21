 <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">account_box</i>
                  </div>
                  <h4 class="card-title"> View Ceo </h4>
                </div>
                <div class="card-body">
                  <?php
                  // echo "<pre>";
                  // print_r($singleRecord);
                  $location = getLocationName($singleRecord['location']); // get location name

                  ?>


                  <table class="table table-striped table-hover table-responsive">
                    <tbody>
                       <tr>
                        <th>Name:</th> <td><?= $singleRecord['name']; ?></td>
                      </tr>
                      <tr>
                        <th>Email:</th> <td><?= $singleRecord['email']; ?></td>
                      </tr>
                      <tr>
                        <th>Mobile No.:</th> <td><?= $singleRecord['mobileCountryCode'].' '.$singleRecord['mobile']; ?></td>
                      </tr>
                      <tr>
                        <th>Address:</th> <td><?= $singleRecord['address']; ?></td>
                      </tr>
                      <tr>
                        <th>Location:</th> <td><?= $location[0]['locationName']; ?></td>
                      </tr>
                      <tr>
                        <th>Document:</th>
                        <td class="td-actions">
                          <a href="<?= base_url('assets/admin/document/ceo/')?><?= $singleRecord['document']?>" target="_blank"><button type="button" rel="tooltip" class="btn btn-rose btn-round" data-original-title="" title="view">
                              <i class="fa fa-eye" aria-hidden="true"></i>
                              </button>
                            </a>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="<?= base_url('assets/admin/document/ceo/')?><?= $singleRecord['document']?>" download><button type="button" rel="tooltip" class="btn btn-rose btn-round" data-original-title="" title="downlaod">
                              <i class="fa fa-download" aria-hidden="true"></i>
                              </button>
                            </a>
                          </td>
                      </tr>
                       <tr>
                        <th>Status:</th> <td><?php if($singleRecord['status'] == 1){echo '<b style="color:green">Active</b>';}else{echo '<b style="color:red">Inactive</b>';} ?></td>
                      </tr>
                    </tbody>
                  </table>

                 <a href="<?= base_url('ceo-list');?>" class="btn btn-rose " >Go Back</a>

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
