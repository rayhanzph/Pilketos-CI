
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
            <a href="<?= base_url('Moderator/add_voters') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add Voters</a>
          </div>

          <?= $this->session->flashdata('alert'); ?>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary d-sm-inline-block">DataTables Example</h6>
              <a href="<?= base_url('Moderator/edit_dump'); ?>" class="float-right d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Edit Token</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>NIS</th>
                      <th>Nama</th>
                      <th>Tanggal Lahir</th>
                      <th>Kelas</th>
                      <th>Status</th>
                      <th>Token</th>
                      <th>Sesi</th>
                      <th colspan="2">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($voters as $v) : ?>
                      <tr>
                        <td><?= $v['nis']; ?></td>
                        <td><?= $v['nama']; ?></td>
                        <td><?= $v['tgl_lahir']; ?></td>
                        <td><?= $v['kelas']; ?></td>
                        <?php if($v['status'] == 0) : ?>
                        <td>Belum</td>
                        <?php else: ?>
                          <td class="text-success">Sudah</td>
                        <?php endif; ?>
                        <td><?= $v['token']; ?></td>
                        <?php if($v['sesi'] == 1) : ?>
                        <td class="text-success">Active</td>
                        <?php else: ?>
                          <td>Off</td>
                        <?php endif; ?>
                        <td>
                          <a href="<?= base_url('Moderator/edit_voters') ?>/<?= $v['id']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                        </td>
                        <td>
                          <a href="<?= base_url('Moderator/delete_voters') ?>/<?= $v['id']; ?>" onclick="return confirm('Anda yakin akan menghapus data?');" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                        </td>                      </tr>
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
