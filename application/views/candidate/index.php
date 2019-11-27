

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <!-- <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
            <a href="<?= base_url('Candidate/add_candidate') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add Candidate</a>
          </div>

          <?= $this->session->flashdata('alert'); ?>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No Urut</th>
                      <th>NIS</th>
                      <th>Nama</th>
                      <th>Kelas</th>
                      <th>Motto</th>
                      <th>Foto</th>
                      <th>Counts</th>
                      <th colspan="3">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($candidate as $c) : ?>
                    <tr>
                      <td><?= $c['no_urut']; ?></td>
                      <td><?= $c['nis']; ?></td>
                      <td><?= $c['nama']; ?></td>
                      <td><?= $c['kelas']; ?></td>
                      <td><?= $c['motto']; ?></td>
                      <td>
                        <img src="<?= base_url('assets/img/candidate/') . $c['foto']; ?>" width="150" height="150" class="img-thumbnail">
                      </td>
                      <td><?= $c['counts']; ?></td>
                      <td>
                        <a href="<?= base_url('Candidate/edit_candidate'); ?>/<?= $c['id']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                      </td>
                      <td>
                         <a href="<?= base_url('Candidate/delete_candidate'); ?>/<?= $c['id']; ?>" class="btn btn-danger" onclick="return confirm('Anda yakin akan menghapus data?');"><i class="fas fa-trash-alt"></i></a>
                      </td>
                      <td>
                         <a href="<?= base_url('Candidate/addhistory'); ?>/<?= $c['id']; ?>" class="btn btn-secondary"><i class="fas fa-download"></i></a>
                      </td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <?php if (!$candidate): ?>
                <div class="col-md">
                  <div class="card">
                    <div class="card-body bg-danger text-center">
                      <i class="fas fa-paste fa-7x text-white"></i>
                      <h2 class="text-white">Keyword tidak dapat ditemukan!</h2>
                      <a href="<?= base_url('Admin'); ?>" class="btn btn-secondary">Reload</a>
                    </div>
                  </div>
                </div>
              <?php endif ?>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
