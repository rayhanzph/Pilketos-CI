
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon ">
          <i class="fas fa-graduation-cap"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Pilketos Online 2019</div>
      </a>

       <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <?php foreach($menu as $m) : ?>
        <?php if($title == $m['menu']) : ?>
          <li class="nav-item active">
            <?php else : ?>
              <li class="nav-item">
        <?php endif; ?>
        <a class="nav-link" href="<?= base_url(); ?><?= $m['url'];?>">
          <i class="<?= $m['icon']; ?>"></i>
          <span><?= $m['menu']; ?></span></a>
      </li>
      <hr class="sidebar-divider my-0">
      <?php endforeach; ?>
<!-- 
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('Admin'); ?>">
          <i class="fas fa-fw fa-user"></i>
          <span>Candidate</span></a>
      </li>

     
      <hr class="sidebar-divider d-none d-md-block mb-0">

      
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Admin/voters'); ?>">
          <i class="fas fa-fw fa-users"></i>
          <span>Voters</span></a>
      </li>
      
      <hr class="sidebar-divider d-none d-md-block mb-0">
      
      
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Admin/kelas'); ?>">
          <i class="fas fa-fw fa-building"></i>
          <span>Kelas</span></a>
      </li>
      
      <hr class="sidebar-divider d-none d-md-block mb-0">

      
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Admin/result'); ?>">
          <i class="fas fa-fw fa-chart-bar"></i>
          <span>Result</span></a>
      </li>

      
      <hr class="sidebar-divider d-none d-md-block mb-0">

      
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Admin/history'); ?>">
          <i class="fas fa-fw fa-book"></i>
          <span>History</span></a>
      </li> 
      
      <hr class="sidebar-divider d-none d-md-block mb-0">

      
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Admin/profile'); ?>">
          <i class="far fa-fw fa-id-card"></i>
          <span>Profile</span></a>
      </li>
       
      <hr class="sidebar-divider d-none d-md-block mb-0">

      
      <li class="nav-item ">
        <a class="nav-link" href="<?= base_url('Admin/staf'); ?>">
          <i class="far fa-fw fa-id-badge"></i>
          <span>Staff</span></a>
      </li>

       -->
      <hr class="sidebar-divider d-none d-md-block">
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
