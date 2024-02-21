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
                  <a class="nav-link" href="<?= base_url('sub-admin-logout');?>">
                    <i class="material-icons">arrow_back</i>
                    <span class="sidebar-normal"> Logout </span>
                  </a>
                </li>

              </ul>
            </div>
               <?php
                 $uri = $this->uri->segment('1');
               ?>
               <ul class="nav">
                
                  <li class="nav-item  <?php if($uri == 'sub-admin-dashboard'){ echo 'active'; }?>">
                     <a class="nav-link" href="<?php echo base_url('sub-admin-dashboard');?>">
                        <i class="material-icons">dashboard</i>
                        <p> Dashboard </p>
                     </a>
                  </li>
                 

                 <li class="nav-item <?php if($uri == 'sub-admin-driver-list' || $uri == 'sub-admin-driver-list'){ echo 'active'; }?>">
                  <a class="nav-link" data-toggle="collapse" href="#driverExamples">
                    <i class="material-icons">account_box</i>
                    <p> Manage Driver
                       <b class="caret"></b>
                    </p>
                 </a>
                 <div class="collapse" id="driverExamples">
                    <ul class="nav">
                       <li class="nav-item <?php if($uri == 'sub-admin-driver-list'){ echo 'active'; }?>">
                          <a class="nav-link" href="<?php echo base_url('sub-admin-driver-list');?>">
                             <i class="material-icons">account_box</i>
                             <p>All Driver </p>
                          </a>
                       </li>
                        <li class="nav-item <?php if($uri == 'sub-admin-add-driver'){ echo 'active'; }?>">
                          <a class="nav-link" href="<?php echo base_url('sub-admin-add-driver');?>">
                             <i class="material-icons">account_box</i>
                             <p>Add Driver</p>
                          </a>
                       </li>
                    </ul>
                 </div>
                </li> 
               
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
                     <a class="navbar-brand" href="<?= base_url('sub-admin-dashboard');?>">Dashboard</a>
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
                              <a class="dropdown-item" href="<?= base_url('sub-admin-update-profile');?>">Profile</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="<?php echo base_url('sub-admin-logout');?>">Log out</a>
                           </div>
                        </li>
                     </ul>
                  </div>
               </div>
            </nav>