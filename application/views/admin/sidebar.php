<body class="">
   <noscript>
      <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0" style="display:none;visibility:hidden"></iframe>
      </noscript>
      <div class="wrapper ">
         <div class="sidebar" data-color="rose" data-background-color="black" data-image="<?= base_url()?>assets/admin/img/sidebar-1.jpg">
            <div class="sidebar-wrapper">
               <div class="user">
                  <div class="photo">
                     <img src="<?php echo base_url('assets/admin/img/default-avatar.png');?>" />
                  </div>
                  <div class="user-info">
                     <a data-toggle="collapse" href="#collapseExample" class="username">
                     <span>
                     Admin  <b class="caret"></b>
                     </span>
                     </a>
                  </div>
               </div>
               <div class="collapse" id="collapseExample">
              <ul class="nav">
                
                <li class="nav-item">
                  <a class="nav-link" href="<?= base_url('admin-logout');?>">
                    <i class="material-icons">arrow_back</i>
                    <span class="sidebar-normal"> Logout </span>
                  </a>
                </li>

              </ul>
            </div>
                <?php
                // check login as admin or ceo
                    $uri = $this->uri->segment('1');
                    $sideBar = getSidebar();
                   //echo "<pre>";
                   //print_r($sideBar);exit;
                 ?>

               <ul class="nav">

                 <?php 
                    

                    if(!empty($sideBar))
                    {
                      $tabToggle = 1; 
                      foreach($sideBar as $menu)
                       { 
                        if($menu['parent_id'] == 0)
                        {
                           //getting sub menu according to main menu
                           $sub_menu = subMenu($menu['id']);
                            if(empty($sub_menu))  {  ?>
                                           
                                 <li class="nav-item  <?php if($uri == $menu['MenuSlug']){ echo 'active'; }?>">
                                   <a class="nav-link" href="<?php echo base_url()?><?= $menu['MenuSlug'];?>">
                                      <i class="material-icons"><?= $menu['icon_name']; ?></i>
                                       <p> <?= $menu['MenuName']; ?> </p>
                                   </a>
                                </li> 

                              <?php }  else { ?>

                                 <li class="nav-item <?php if($uri == $menu['MenuSlug']){ echo 'active'; }?>">  
                                   <a class="nav-link" data-toggle="collapse" href="#<?= $tabToggle; ?>Examples">
                                     <i class="material-icons"><?= $menu['icon_name']; ?></i>
                                       <p><?= $menu['MenuName']; ?>
                                       <b class="caret"></b>
                                    </p>
                                  </a>
                               

                                 <div class="collapse" id="<?= $tabToggle; ?>Examples">
                                   <ul class="nav"> 
                                     <?php foreach ($sub_menu as $val) {  
                                            ?>
                                           <li class="nav-item <?php if($uri == $val['MenuSlug']){ echo 'active'; }?>">
                                              <a class="nav-link" href="<?php echo base_url();?><?= $val['MenuSlug'];?>">
                                                 <i class="material-icons"><?= $val['icon_name']?></i>
                                                 <p> <?= $val['MenuName']; ?> </p>
                                              </a>
                                           </li>
                                      <?php  }  ?>
                                   </ul>
                                </div>
                              </li> 
                        <?php } } $tabToggle ++; } } ?>


             <!--  <li class="nav-item  <?//php if($uri == 'dashboard'){ echo 'active'; }?>">
                     <a class="nav-link" href="<?//php echo base_url('dashboard');?>">
                        <i class="material-icons">dashboard</i>
                        <p> Dashboard </p>
                     </a>
                  </li>
                 

               
                <li class="nav-item <?//php if($uri == 'add-country' || $uri == 'country-list'){ echo 'active'; }?>">
                  <a class="nav-link" data-toggle="collapse" href="#countryExamples">
                    <i class="material-icons">domain</i>
                    <p> Manage Country
                       <b class="caret"></b>
                    </p>
                  </a>
                 <div class="collapse" id="countryExamples">
                    <ul class="nav">
                       <li class="nav-item <?//php if($uri == 'country-list'){ echo 'active'; }?>">
                          <a class="nav-link" href="<?//php echo base_url('country-list');?>">
                             <i class="material-icons">menu</i>
                             <p> All Country </p>
                          </a>
                       </li>
                       <li class="nav-item <?//php if($uri == 'add-country'){ echo 'active'; }?>">
                          <a class="nav-link" href="<?//php  echo base_url('add-country');?>">
                             <i class="material-icons">add_box</i>
                             <p> Add Country </p>
                          </a>
                       </li>
                    </ul>
                 </div>
                </li>
            
            
              
              <li class="nav-item <?//php if($uri == 'add-state' || $uri == 'stete-list'){ echo 'active'; }?>">
                  <a class="nav-link" data-toggle="collapse" href="#stateExamples">
                    <i class="material-icons">clear_all</i>
                    <p> Manage State
                       <b class="caret"></b>
                    </p>
                  </a>
                 <div class="collapse" id="stateExamples">
                    <ul class="nav">
                       <li class="nav-item <?//php if($uri == 'state-list'){ echo 'active'; }?>">
                          <a class="nav-link" href="<?////php echo base_url('state-list');?>">
                             <i class="material-icons">menu</i>
                             <p> All State </p>
                          </a>
                       </li>
                       <li class="nav-item <?//php if($uri == 'add-state'){ echo 'active'; }?>">
                          <a class="nav-link" href="<?//php echo base_url('add-state');?>">
                             <i class="material-icons">add_box</i>
                             <p> Add State </p>
                          </a>
                       </li>
                    </ul>
                 </div>
                </li> -->
                <!--

                 <li class="nav-item <?//php if($uri == 'add-city' || $uri == 'city-list'){ echo 'active'; }?>">
                  <a class="nav-link" data-toggle="collapse" href="#tablesExamples">
                    <i class="material-icons">poll</i>
                    <p> Manage City
                       <b class="caret"></b>
                    </p>
                  </a>
                 <div class="collapse" id="tablesExamples">
                    <ul class="nav">
                       <li class="nav-item <?//php if($uri == 'city-list'){ echo 'active'; }?>">
                          <a class="nav-link" href="<?php echo base_url('city-list');?>">
                             <i class="material-icons">menu</i>
                             <p> All City </p>
                          </a>
                       </li>
                       <li class="nav-item <?//php if($uri == 'add-city'){ echo 'active'; }?>">
                          <a class="nav-link" href="<?php echo base_url('add-city');?>">
                             <i class="material-icons">add_box</i>
                             <p> Add City </p>
                          </a>
                       </li>
                    </ul>
                 </div>
                </li>


                <li class="nav-item <?//php if($uri == 'add-airport' || $uri == 'airport-list'){ echo 'active'; }?>">
                  <a class="nav-link" data-toggle="collapse" href="#airportExamples">
                    <i class="material-icons">flight_takeoff</i>
                    <p> Manage Airport
                       <b class="caret"></b>
                    </p>
                  </a>
                 <div class="collapse" id="airportExamples">
                    <ul class="nav">
                       <li class="nav-item <?//php if($uri == 'airport-list'){ echo 'active'; }?>">
                          <a class="nav-link" href="<?php echo base_url('airport-list');?>">
                             <i class="material-icons">menu</i>
                             <p> All Airport </p>
                          </a>
                       </li>
                       <li class="nav-item <?//php if($uri == 'add-airport'){ echo 'active'; }?>">
                          <a class="nav-link" href="<?php echo base_url('add-airport');?>">
                             <i class="material-icons">add_box</i>
                             <p> Add Airport </p>
                          </a>
                       </li>
                    </ul>
                 </div>
                </li>

                
                <li class="nav-item <?//php if($uri == 'add-location' || $uri == 'location-list'){ echo 'active'; }?>">
                  <a class="nav-link" data-toggle="collapse" href="#locationExamples">
                    <i class="material-icons">location_on</i>
                    <p> Manage Location
                       <b class="caret"></b>
                    </p>
                  </a>
                 <div class="collapse" id="locationExamples">
                    <ul class="nav">
                       <li class="nav-item <?//php if($uri == 'location-list'){ echo 'active'; }?>">
                          <a class="nav-link" href="<?//php echo base_url('location-list');?>">
                             <i class="material-icons">menu</i>
                             <p> All Location </p>
                          </a>
                       </li>
                       <li class="nav-item <?//php if($uri == 'add-location'){ echo 'active'; }?>">
                          <a class="nav-link" href="<?//php echo base_url('add-location');?>">
                             <i class="material-icons">add_box</i>
                             <p> Add Location </p>
                          </a>
                       </li>
                    </ul>
                 </div>
                </li>



                <li class="nav-item <?////php if($uri == 'add-branch' || $uri == 'branch-list'){ echo 'active'; }?>">
                  <a class="nav-link" data-toggle="collapse" href="#branchExamples">
                    <i class="material-icons">account_balance</i>
                    <p> Manage Branch
                       <b class="caret"></b>
                    </p>
                  </a>
                 <div class="collapse" id="branchExamples">
                    <ul class="nav">
                       <li class="nav-item <?////php if($uri == 'branch-list'){ echo 'active'; }?>">
                          <a class="nav-link" href="<?////php echo base_url('branch-list');?>">
                             <i class="material-icons">menu</i>
                             <p> All Branch </p>
                          </a>
                       </li>
                       <li class="nav-item <?////php if($uri == 'add-branch'){ echo 'active'; }?>">
                          <a class="nav-link" href="<?////php echo base_url('add-branch');?>">
                             <i class="material-icons">add_box</i>
                             <p> Add Branch </p>
                          </a>
                       </li>
                    </ul>
                 </div>
                </li>
                  
                 <li class="nav-item  <?//php if($uri == 'vehicle-type'){ echo 'active'; }?>">
                     <a class="nav-link" href="<?//php echo base_url('vehicle-type');?>">
                        <i class="material-icons">drive_eta</i>
                        <p>Manage Vehicle Type </p>
                     </a>
                </li>

                  <li class="nav-item  <?//php if($uri == 'vehicle-model'){ echo 'active'; }?>">
                     <a class="nav-link" href="<?//p////hp echo base_url('vehicle-model');?>">
                        <i class="material-icons">drive_eta</i>
                        <p>Manage Vehicle Model </p>
                     </a>
                </li>

                  <li class="nav-item  <?//php if($uri == 'vehicle-colour'){ echo 'active'; }?>">
                     <a class="nav-link" href="<?//php echo base_url('vehicle-colour');?>">
                        <i class="material-icons">drive_eta</i>
                        <p>Manage Vehicle Colour </p>
                     </a>
                </li>
                

                 <li class="nav-item <?//php if($uri == 'add-vehicle' || $uri == 'vehicle-list'){ echo 'active'; }?>">
                 <a class="nav-link" data-toggle="collapse" href="#vehicleExamples">
                    <i class="material-icons">drive_eta</i>
                    <p> Manage Vehicle
                       <b class="caret"></b>
                    </p>
                 </a>
                 <div class="collapse" id="vehicleExamples">
                    <ul class="nav">
                       <li class="nav-item <?//php if($uri == 'vehicle-list'){ echo 'active'; }?>">
                          <a class="nav-link" href="<?php echo base_url('vehicle-list');?>">
                             <i class="material-icons">menu</i>
                             <p> All Vehicle </p>
                          </a>
                       </li>
                       <li class="nav-item <?//php if($uri == 'add-vehicle'){ echo 'active'; }?>">
                          <a class="nav-link" href="<?php echo base_url('add-vehicle');?>">
                             <i class="material-icons">add_box</i>
                             <p> Add Vehicle </p>
                          </a>
                       </li>
                    </ul>
                 </div>
                </li>


                
                 <li class="nav-item  <?//php if($uri == 'coupon-list'){ echo 'active'; }?>">
                     <a class="nav-link" href="<?//php echo base_url('coupon-list');?>">
                        <i class="material-icons">redeem</i>
                        <p> Coupon </p>
                     </a>
                </li>
             
                <li class="nav-item <?//php if($uri == 'add-user' || $uri == 'user-list'){ echo 'active'; }?>">
                  <a class="nav-link" data-toggle="collapse" href="#userExamples">
                    <i class="material-icons">account_box</i>
                    <p> Manage Employee
                       <b class="caret"></b>
                    </p>
                 </a>
                 <div class="collapse" id="userExamples">
                    <ul class="nav">
                       <li class="nav-item <?//php if($uri == 'ceo-list'){ echo 'active'; }?>">
                          <a class="nav-link" href="<?php echo base_url('ceo-list');?>">
                             <i class="material-icons">account_box</i>
                             <p> CEO </p>
                          </a>
                       </li>
                       <li class="nav-item <?//php if($uri == 'branch-manager-list'){ echo 'active'; }?>">
                          <a class="nav-link" href="<?php echo base_url('branch-manager-list');?>">
                             <i class="material-icons">account_box</i>
                             <p>Branch Manager</p>
                          </a>
                       </li>
                       <li class="nav-item <?//php if($uri == 'driver-list'){ echo 'active'; }?>">
                          <a class="nav-link" href="<?php echo base_url('driver-list');?>">
                             <i class="material-icons">account_box</i>
                             <p> Driver </p>
                          </a>
                       </li>
                    </ul>
                 </div>
                </li> 
 -->


                <!--///////////////////// add user tab/////////////////////// -->
                 <!-- <li class="nav-item <?//php if($uri == 'add-user' || $uri == 'user-list'){ echo 'active'; }?>">
                  <a class="nav-link" data-toggle="collapse" href="#userExamples">
                    <i class="material-icons">account_box</i>
                    <p> Manage User
                       <b class="caret"></b>
                    </p>
                 </a>
                 <div class="collapse" id="userExamples">
                    <ul class="nav">
                       <li class="nav-item <?//php //if($uri == 'user-list'){ echo 'active'; }?>">
                          <a class="nav-link" href="<?//php echo base_url('user-list');?>">
                             <i class="material-icons">menu</i>
                             <p> All Users </p>
                          </a>
                       </li>
                       <li class="nav-item <?//php if($uri == 'add-user'){ echo 'active'; }?>">
                          <a class="nav-link" href="<?//php echo base_url('add-user');?>">
                             <i class="material-icons">add_box</i>
                             <p> Add User </p>
                          </a>
                       </li>
                    </ul>
                 </div>
                </li> -->


        </ul>
      </div>
   </div>
         <div class="main-panel">
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
               <div class="container-fluid">
                  <div class="navbar-wrapper">
                     <div class="navbar-wrapper">
                        <div class="navbar-minimize">
                          <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
                            <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
                            <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
                          <div class="ripple-container"></div></button>
                        </div>
                      </div>
                     <a class="navbar-brand" href="<?= base_url('dashboard');?>">Dashboard</a>
                  </div>
                  <div class="collapse navbar-collapse justify-content-end">
                     <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                           <a class="nav-link" href="#" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="material-icons">person</i>
                              <p class="d-lg-none d-md-block">
                                 Account
                              </p>
                           </a>
                           <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                              <a class="dropdown-item" href="<?= base_url('update-profile');?>">Profile</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="<?php echo base_url('admin-logout');?>">Log out</a>
                           </div>
                        </li>
                     </ul>
                  </div>
               </div>
            </nav>


         