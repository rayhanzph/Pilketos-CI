<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Informasi</h1>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nama</th>
                      <th>Counts</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($result as $r) : ?>
                    <tr>
                      <td><?= $r['nama']; ?></td>
                      <td><?= $r['counts']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
                </div>
                <div class="card-body">
                  <?php foreach($query as $q) : ?>
                  <h4 class="small font-weight-bold"><?= $q['nama']; ?> 
                  <?php $percent = round(($q['counts'] / 1970) * 100); ?>
                  <!-- kurang pengambilan data seluruh voter*status=1 -->
                  <span class="float-right"><?= $percent ?>%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: <?= $percent; ?>%;"
                     aria-valuenow="<?= $percent; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <?php endforeach; ?>
                </div>
              </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content