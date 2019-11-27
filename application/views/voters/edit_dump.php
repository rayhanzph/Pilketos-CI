
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
         
          <div class="row">
            <div class="col-md-8">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Form Edit Data Dumping Voters</h6>
                </div>
                <div class="card-body">
                 <form action="<?= base_url('Voters/edit_dump'); ?>" method="post">
                   <div class="form-group">
                    <div class="form-group">
                      <select class="form-control" id="kelas" name="kelas">
                          <option selected>Pilih Kelas</option>
                        <?php foreach($kelas as $k) : ?>
                          <option value="<?= $k['kelas'] ?>"><?= $k['kelas']; ?></option>
                        <?php endforeach; ?>
                      </select>
                      <!-- <input type="text" name="kelas" placeholder="kelas"></input> -->
                    </div>
                    <div class="form-group">
                      <select class="form-control" id="role" name="role_id">
                          <option selected>Pilih Role</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                      </select>
                    </div>
                   <div class="form-group">
                     <input type="text" name="token" class="form-control" placeholder="Token">
                     <?= form_error('token','<small class="text-danger pl-3">','</small>'); ?>
                   </div>
                   <button type="submit" class="btn btn-primary">Edit Data</button>
                   <a href="<?= base_url('Voters') ?>" class="btn btn-warning">Kembali</a>
                 </form>
                </div>
              </div>
            </div>
          </div>
          

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
