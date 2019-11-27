<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

          <div class="row">

            
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Voted</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($voted); ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-check fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Not Voted</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($not); ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-times fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Voters</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($all); ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Candidate</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($can); ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-tag fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-6">
              <!-- Basic Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Pilketos Online</h6>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-5">
                    <img src="<?= base_url('assets/img/smecone.png'); ?>" width="250" height="200" class="img-thumbnail">
                  </div>
                  <div class="col-sm-7 d-inline-block">
                    <h2 class="text-gray-800">Pemilihan Ketua Osis</h2>
                    <h4 class="text-gray-800 mb-2">Periode : <?= date('Y'); ?></h4>
                    <h4 class="text-gray-800 mb-2">Admin : Nama Admin</h4>
                  </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Petugas</h6>
                </div>
                <div class="card-body">
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Username</th>
                      <th>Role</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($staf as $s) : ?>
                    <tr>
                      <td><?= $s['username_admin']; ?></td>
                      <td><?= $s['role_id_admin']; ?></td>
                      <?php if ($s['is_active'] == 1): ?>
                        <td class="text-success">Active</td>
                        <td>
                          <?php if($s['role_id_admin'] == 1) : ?>
                          <button class="btn btn-secondary d-md-inline disable" aria-disable="true"><i class="far fa-check-circle"></i></button>
                          <?php elseif($s['role_id_admin'] == 2) : ?>
                            <a href="<?= base_url('Admin/off_staf'); ?>/<?= $s['id']; ?>" class="btn btn-danger d-md-inline" onclick="return confirm('Nonaktifkan User?');"><i class="fas fa-minus-circle"></i></a>
                          <?php endif; ?>
                        </td>
                        <?php elseif($s['is_active'] == 0) : ?>
                          <td class="text-danger">Off</td>
                          <td>
                            <?php if($s['role_id_admin'] == 1) : ?>
                            <button class="btn btn-secondary d-md-inline disable" aria-disable="true"><i class="far fa-check-circle"></i></button>
                            <?php elseif($s['role_id_admin'] == 2) : ?>
                              <a href="<?= base_url('Admin/on_staf'); ?>/<?= $s['id']; ?>" class="btn btn-success d-md-inline" onclick="return confirm('Aktifkan User?');"><i class="far fa-check-circle"></i></a>
                            <?php endif; ?>
                          </td>
                      <?php endif; ?>
                      <!-- <td>
                        <a href="" class="btn btn-primary d-md-inline"><i class="fas fa-eye"></i></a>
                        <?php if($s['role_id_admi'] == 1) : ?>
                        <button class="btn btn-secondary d-md-inline disable" aria-disable="true"><i class="far fa-check-circle"></i></button>
                        <?php elseif($s['role_id_admin'] == 2) : ?>
                          <a href="" class="btn btn-success d-md-inline"><i class="far fa-check-circle"></i></a>
                        <?php endif; ?>
                      </td>
                    </tr> -->
                    <?php endforeach; ?>
                  </tbody>
                </table>
                </div>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
