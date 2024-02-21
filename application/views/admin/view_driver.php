 <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">account_box</i>
                  </div>
                  <h4 class="card-title"> View Driver </h4>
                </div>
                <div class="card-body">
                  <?php
                  //echo "<pre>";
                  //print_r($singleRecord); exit;
                  ?>


                  <table class="table table-striped table-hover table-responsive">
                    <tbody>
                       <tr>
                        <th>First Name:</th> <td><?= $singleRecord[0]['firstName']; ?></td>
                      </tr>
                       <tr>
                        <th>Last Name:</th> <td><?= $singleRecord[0]['lastName']; ?></td>
                      </tr>
                      <tr>
                        <th>D.O.B:</th> <td><?= $singleRecord[0]['dob']; ?></td>
                      </tr>
                      <tr>
                        <th>Email:</th> <td><?= $singleRecord[0]['email']; ?></td>
                      </tr>
                      <tr>
                        <th>Mobile No.:</th> <td><?= $singleRecord[0]['mobileCountryCode'].' '.$singleRecord[0]['mobile']; ?></td>
                      </tr>
                      <tr>
                        <th>Address:</th> <td><?= $singleRecord[0]['address']; ?></td>
                      </tr>
                      <tr>
                        <th>Location:</th> <td><?= $singleRecord[0]['locationName']; ?></td>
                      </tr>
                       <tr>
                        <th>CEO:</th> <td><?= $singleRecord[0]['ceoName']; ?></td>
                      </tr>
                       <tr>
                        <th>Branch:</th> <td><?= $singleRecord[0]['branchNames']; ?></td>
                      </tr>
                      <tr>
                        <th>Branch Manager Name:</th> <td><?= $singleRecord[0]['branchManagerName']; ?></td>
                      </tr>
                       <tr>
                        <th>City:</th> <td><?= $singleRecord[0]['cityName']; ?></td>
                      </tr>
                      <tr>
                        <th>About Me:</th> <td><?= $singleRecord[0]['aboutMe']; ?></td>
                      </tr>


                       <tr>
                        <th>Routing No:</th> <td><?= $singleRecord[0]['routingNo']; ?></td>
                      </tr>

                       <tr>
                        <th>Account No:</th> <td><?= $singleRecord[0]['accountNo']; ?></td>
                      </tr>

                       <tr>
                        <th>Account Holder Name:</th> <td><?= $singleRecord[0]['accountHolderName']; ?></td>
                      </tr>

                       <tr>
                        <th>Account Type:</th> <td><?= $singleRecord[0]['accountType']; ?></td>
                      </tr>


                      <tr>
                        <th>Vehicle Plate No:</th> <td><?= $singleRecord[0]['vehiclePlateNo']; ?></td>
                      </tr>
                      <tr>
                        <th>Vehicle Type:</th> <td><?= $singleRecord[0]['vehicleType']; ?></td>
                      </tr>
                      <tr>
                        <th>Vehicle Model:</th> <td><?= $singleRecord[0]['vehicleModel']; ?></td>
                      </tr>
                      <tr>
                        <th>Vehicle Colour:</th> <td><?= $singleRecord[0]['vehicleColour']; ?></td>
                      </tr>
                      <tr>
                        <th>Registration Year:</th> <td><?= $singleRecord[0]['registrationYear']; ?></td>
                      </tr>
                      <tr>
                        <th>Child Seat Available:</th> <td><?= $singleRecord[0]['childSeatAvailable']; ?></td>
                      </tr>
                      <tr>
                        <th>Maximum Person:</th> <td><?= $singleRecord[0]['maximumPerson']; ?></td>
                      </tr>
                      <tr>
                        <th>Maximum Luggage:</th> <td><?= $singleRecord[0]['maximumLuggage']; ?></td>
                      </tr>
                     <tr>
                        <th>Vehicle Image:</th>
                        <td class="td-actions">
                          <img src="<?= base_url('assets/admin/document/driver/')?><?= $singleRecord[0]['vehicleImage']?>" style="height: 70px;width:70px;">  &nbsp;&nbsp;&nbsp;&nbsp;
                          <a href="<?= base_url('assets/admin/document/driver/')?><?= $singleRecord[0]['vehicleImage']?>" target="_blank"><button type="button" rel="tooltip" class="btn btn-rose btn-round" data-original-title="" title="view">
                              <i class="fa fa-eye" aria-hidden="true"></i>
                              </button>
                            </a>

                            &nbsp;&nbsp;&nbsp;&nbsp;
                           <a href="<?= base_url('assets/admin/document/driver/')?><?= $singleRecord[0]['vehicleImage']?>" download><button type="button" rel="tooltip" class="btn btn-rose btn-round" data-original-title="" title="view">
                              <i class="fa fa-download" aria-hidden="true"></i>
                              </button>
                            </a>
                          </td>
                      </tr>





                      <tr>
                        <th>License Front Image:</th>
                        <td class="td-actions">
                          <img src="<?= base_url('assets/admin/document/driver/')?><?= $singleRecord[0]['licenseFrontImage']?>" style="height: 70px;width:70px;">  &nbsp;&nbsp;&nbsp;&nbsp;
                          <a href="<?= base_url('assets/admin/document/driver/')?><?= $singleRecord[0]['licenseFrontImage']?>" target="_blank"><button type="button" rel="tooltip" class="btn btn-rose btn-round" data-original-title="" title="view">
                              <i class="fa fa-eye" aria-hidden="true"></i>
                              </button>
                            </a>

                            &nbsp;&nbsp;&nbsp;&nbsp;
                           <a href="<?= base_url('assets/admin/document/driver/')?><?= $singleRecord[0]['licenseFrontImage']?>" download><button type="button" rel="tooltip" class="btn btn-rose btn-round" data-original-title="" title="view">
                              <i class="fa fa-download" aria-hidden="true"></i>
                              </button>
                            </a>
                          </td>
                      </tr>

                       <tr>
                        <th>License Back Image:</th>
                        <td class="td-actions">
                           <img src="<?= base_url('assets/admin/document/driver/')?><?= $singleRecord[0]['licenseBackImage']?>" style="height: 70px;width:70px;">  &nbsp;&nbsp;&nbsp;&nbsp;
                          <a href="<?= base_url('assets/admin/document/driver/')?><?= $singleRecord[0]['licenseBackImage']?>" target="_blank"><button type="button" rel="tooltip" class="btn btn-rose btn-round" data-original-title="" title="view">
                              <i class="fa fa-eye" aria-hidden="true"></i>
                              </button>
                            </a>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                           <a href="<?= base_url('assets/admin/document/driver/')?><?= $singleRecord[0]['licenseBackImage']?>" download><button type="button" rel="tooltip" class="btn btn-rose btn-round" data-original-title="" title="view">
                              <i class="fa fa-download" aria-hidden="true"></i>
                              </button>
                            </a>
                          </td>
                      </tr>

                       <tr>
                        <th>Insurance Image:</th>
                        <td class="td-actions">
                            <img src="<?= base_url('assets/admin/document/driver/')?><?= $singleRecord[0]['insuranceFileImage']?>" style="height: 70px;width:70px;">  &nbsp;&nbsp;&nbsp;&nbsp;
                          <a href="<?= base_url('assets/admin/document/driver/')?><?= $singleRecord[0]['insuranceFileImage']?>" target="_blank"><button type="button" rel="tooltip" class="btn btn-rose btn-round" data-original-title="" title="view">
                              <i class="fa fa-eye" aria-hidden="true"></i>
                              </button>
                            </a>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                           <a href="<?= base_url('assets/admin/document/driver/')?><?= $singleRecord[0]['insuranceFileImage']?>" download><button type="button" rel="tooltip" class="btn btn-rose btn-round" data-original-title="" title="view">
                              <i class="fa fa-download" aria-hidden="true"></i>
                              </button>
                            </a>
                          </td>
                      </tr>
                       <tr>
                        <th>Status:</th> <td><?php if($singleRecord[0]['status'] == 1){echo '<b style="color:green">Active</b>';}else{echo '<b style="color:red">Inactive</b>';} ?></td>
                      </tr>
                    </tbody>
                  </table>

                 <a href="<?= base_url('driver-list');?>" class="btn btn-rose " >Go Back</a>

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
