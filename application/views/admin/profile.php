

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon ">
          <i class="fas fa-graduation-cap"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Pilketos Online</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Admin'); ?>">
          <i class="fas fa-fw fa-user"></i>
          <span>Candidate</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block mb-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Admin/voters'); ?>">
          <i class="fas fa-fw fa-users"></i>
          <span>Voters</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block mb-0">
      
      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Admin/kelas'); ?>">
          <i class="fas fa-fw fa-building"></i>
          <span>Kelas</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block mb-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Admin/result'); ?>">
          <i class="fas fa-fw fa-chart-bar"></i>
          <span>Result</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block mb-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Admin/history'); ?>">
          <i class="fas fa-fw fa-book"></i>
          <span>History</span></a>
      </li> 
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block mb-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('Admin/profile'); ?>">
          <i class="far fa-fw fa-id-card"></i>
          <span>Profile</span></a>
      </li>
       <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block mb-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Admin/staf'); ?>">
          <i class="far fa-fw fa-id-badge"></i>
          <span>Staff</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>


            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['username']; ?></span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

          <div class="row">
            <div class="col-md-5">
              <div class="card mb-3">
                <img src="<?= base_url('assets/img/smecone.png'); ?>" class="card-img-top" alt="school logo" style="max-width: 300px; max-height: 300px; margin: auto;">
                <div class="card-body text-center">
                  <h5 class="card-title text-primary mb-0" style="font-style: 'Montserrat'; font-weight: 800;">SMK Negeri 1 Purwokerto</h5>
                  <p class="card-text mb-0">Jalan. dr. Soeparno No. 29</p>
                  <p class="card-text mb-0">Telp / Fax : (0281) 637132</p>
                  <p class="card-text mb-0">Email : admin@smkn1purwokerto.sch.id</p>
                </div>
              </div>
            </div>
            <div class="col-md-7">
              <div class="card mb-3">
                <div class="card-body">
                  <form>
                    <div class="form-group">
                      <label for="exampleFormControlFile1">School Logo</label>
                      <input type="file" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="School Name" value="SMK Negeri 1 Purwokerto">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Address" value="Jalan. dr. Soeparno No. 29">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Telp/Fax" value="Telp / Fax : (0281) 637132">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Email" value="Email : admin@smkn1purwokerto.sch.id">
                    </div>
                    <button type="submit" class="btn btn-primary">Edit Profile</button>
                  </form>
                </div>
              </div>
            </div>
          </div>

         <!--  <div class="card">
            <img src="<?= base_url('assets/img/smecone.png'); ?>" class="card-img" style="width: 100px; height: 100px;">
            <div class="card-body d-inline">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>  
          </div> -->

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?= base_url('Staff/logout'); ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>
