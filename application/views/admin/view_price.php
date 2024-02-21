 <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">settings_application</i>
                  </div>
                  <h4 class="card-title"> View Price Setting </h4>
                </div>
                <?php
                // echo "<pre>";
                // print_r($singlePriceRecord);exit;
                ?>
                <div class="card-body">
                  <table class="table table-striped table-hover table-responsive">
                    <tbody>
                       <tr>
                        <th>Vehicle Type:</th> <td><?= $singlePriceRecord[0]['vehicleTypeName']; ?></td>
                      </tr>
                      <tr>
                        <th>Price (per Km):</th> <td><?= $singlePriceRecord[0]['normalPrice']; ?></td>
                      </tr>
                      <tr>
                        <th>Mid Night Charge:</th> <td><?= $singlePriceRecord[0]['midNightCharge']; ?></td>
                      </tr>
                      <tr>
                        <th>Child Charge (per child):</th> <td><?= $singlePriceRecord[0]['childCharge']; ?></td>
                      </tr>
                      <tr>
                        <th>Additional Stop Charge:</th> <td><?= $singlePriceRecord[0]['additionalStop']; ?></td>
                      </tr>
                       <tr>
                        <th>Additional Waiting Time (per minute):</th> <td><?= $singlePriceRecord[0]['additionalWaitingTime']; ?></td>
                      </tr>
                       <tr>
                        <th>Additional Kelometer (per km):</th> <td><?= $singlePriceRecord[0]['additionalKelometer']; ?></td>
                      </tr> 
                      <tr>
                        <th>User Cancellation Charge (in %):</th> <td><?= $singlePriceRecord[0]['userCancellationCharge']; ?></td>
                      </tr> 
                      <tr>
                        <th>Driver Cancellation Charge (in %):</th> <td><?= $singlePriceRecord[0]['driverCancellationCharge']; ?></td>
                      </tr>
                      
                    </tbody>
                  </table>
                  
                 <a href="<?= base_url('price-list');?>" class="btn btn-rose " >Go Back</a>
               
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

      
