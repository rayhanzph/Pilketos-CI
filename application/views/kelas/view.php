
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
         
          <div class="row">
            <div class="col-md-6">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">View Data Voters</h6>
                </div>
                <div class="card-body">
                 <form action="" method="post">
                  <div class="form-group row">
                    <label for="no_urut" class="col-sm-2 col-form-label">Kelas</label>
                    <div class="col-sm-10">
                      <input type="text" name="kelas" class="form-control" id="kelas" value="<?= $kelas['kelas']; ?>" readonly>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="no_urut" class="col-sm-2 col-form-label">Sesi</label>
                      <div class="col-sm-6">
                        <input type="text" name="no_urut" class="form-control" id="no_urut" 
                        <?php if($kelas['sesi'] == 0) : ?>
                          value="Off"
                          <?php elseif($kelas['sesi'] == 1) : ?>
                            value="Active"
                            <?php else: ?>
                              value="Selesai"
                            <?php endif; ?>
                          readonly>
                      </div>
                    <div class="col-sm-4">
                      <a href="<?= base_url('Kelas/default') ?>/<?= $kelas['token']; ?>" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Reset sesi"><i class="fas fa-sync-alt"></i></a>
                      <a href="<?= base_url('Kelas/activation') ?>/<?= $kelas['token']; ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Aktifkan sesi"><i class="fas fa-check"></i></a>
                      <a href="" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Selesaikan sesi"><i class="fas fa-times"></i></a>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="no_urut" class="col-sm-2 col-form-label">Voted</label>
                      <div class="col-sm-6">
                        <input type="text" name="voted" class="form-control" id="voted" value="<?= $kelas['sudah']; ?>"readonly>
                      </div>
                    <div class="col-sm-4">
                      <a href="<?= base_url('Kelas/reset_voted') ?>/<?= $kelas['token']; ?>" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Reset voted"><i class="fas fa-sync-alt"></i></a>
                      <a href="<?= base_url('Kelas/setAll') ?>/<?= $kelas['token']; ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Set All voted"><i class="fas fa-times"></i></a>
                    </div>
                  </div>
                 </form>
                </div>
                <div class="card-footer text-right">
                  <a href="<?= base_url('Kelas') ?>" class="btn btn-warning">Kembali</a>
                </div>
              </div>
            </div>
          </div>
          

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
