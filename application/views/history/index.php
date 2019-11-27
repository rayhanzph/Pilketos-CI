

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <!-- <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
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
                      <th>Periode</th>
                      <th>Foto</th>
                      <th>Counts</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($history as $h) : ?>
                    <tr>
                      <td><?= $h['no_urut']; ?></td>
                      <td><?= $h['nis']; ?></td>
                      <td><?= $h['nama']; ?></td>
                      <td><?= $h['kelas']; ?></td>
                      <td><?= $h['motto']; ?></td>
                      <td>2018/2019</td>
                      <td>
                        <img src="<?= base_url('assets/img/candidate/') . $h['foto']; ?>" width="150" height="150" class="img-thumbnail">
                      </td>
                      <td><?= $h['counts']; ?></td>
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
