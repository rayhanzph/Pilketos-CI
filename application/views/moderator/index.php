
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Kelas</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th rowspan="2">Kelas</th>
                      <th rowspan="2">Jumlah</th>
                      <th colspan="2" rowspan="2">Status</th>
                      <th rowspan="2">Token</th>
                      <th rowspan="2">Sesi</th>
                      <th rowspan="2">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- <tr>
                      <td>XII RPL 1</td>
                      <td>36</td>
                      <td class="text-success">34</td>
                      <td class="text-danger">2</td>
                      <td class="text-success">Aktif</td>
                      <td>
                        <button class="btn btn-primary">Aktifkan sesi</button>
                      </td>
                    </tr> -->
                    <?php foreach($voter as $v) :  ?>
                      <tr>
                        <td><?= $v['kelas']; ?></td>
                        <td><?= $v['jumlah']; ?></td>
                        <td class="text-success"><?= $v['sudah']; ?></td>
                        <td class="text-danger"><?= $v['jumlah'] - $v['sudah']; ?></td>
                        <td><?= $v['token']; ?></td>
                        <?php if($v['sesi'] == 0) : ?>
                          <td class="text-gray">Off</td>
                          <td>
                            <a href="<?= base_url('Moderator/activation'); ?>/<?= $v['token']; ?>" class="btn btn-primary" onclick="return confirm('Sesi ini akan diaktifkan?');">Aktifkan sesi</a>
                          </td>
                          <?php elseif ($v['sesi'] == 1) :  ?>
                            <td class="text-success">Active</td>
                            <td>
                              <a href="<?= base_url('Moderator/completed'); ?>/<?= $v['token']; ?>" class="btn btn-warning" onclick="return confirm('Sesi ini akan diselesaikan?');">Selesaikan sesi</a>
                            </td>
                            <?php else: ?>
                              <td class="text-danger">Selesai</td>
                              <td>
                                <button type="button" class="btn btn-secondary" disabled>Sesi selesai!</button>
                              </td>
                        <?php endif; ?>
                        <!-- <td>
                          <a href=" //base_url('Moderator/activation'); ?>/ //$v['token']; ?>" class="btn btn-primary" onclick="return confirm('Sesi ini akan diaktifkan?');">Aktifkan sesi</a>
                        </td> -->
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
