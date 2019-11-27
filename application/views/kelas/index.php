
        <!-- Begin Page Content -->
        <div class="container-fluid">
  
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
            <a href="<?= base_url('Kelas/add_kelas') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add Kelas</a>
          </div>

          <?= $this->session->flashdata('alert'); ?>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Kelas</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Kelas</th>
                      <th>Jumlah</th>
                      <th>Token</th>
                      <th colspan="2">Status</th>
                      <th>Sesi</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($kelas as $k) : ?>
                    <tr>
                      <td><?= $k['kelas']; ?></td>
                      <td><?= $k['jumlah']; ?></td>
                      <td><?= $k['token']; ?></td>
                      <td><?= $k['sudah']; ?></td>
                      <td><?= $k['jumlah'] - $k['sudah']; ?></td>
                      <?php if($k['sesi'] == 1 ) : ?>
                        <td class="text-success">Active</td>
                        <?php elseif($k['sesi'] == 2) :  ?>
                        <td class="text-danger">Selesai</td>
                        <?php else : ?>
                          <td class="text-gray">Off</td>
                        <?php endif; ?>
                      <td>
                        <a href="<?= base_url('Kelas/edit_kelas') ?>/<?= $k['id']; ?>" class="btn btn-warning d-md-inline"><i class="fas fa-edit"></i></a>
                        <a href="<?= base_url('Kelas/delete_kelas') ?>/<?= $k['id']; ?>" onclick="return confirm('Anda yakin akan menghapus data?');" class="btn btn-danger d-md-inline"><i class="fas fa-trash-alt"></i></a>
                        <a href="<?= base_url('Kelas/view') ?>/<?= $k['token']; ?>" class="btn btn-secondary d-md-inline"><i class="fas fa-ellipsis-h"></i></a>
                      </td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
