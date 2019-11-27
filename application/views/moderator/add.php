
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
         
          <div class="row">
            <div class="col-md-8">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Form Tambah Data Voters</h6>
                </div>
                <div class="card-body">
                 <form action="<?= base_url('Moderator/add_voters'); ?>" method="post">
                   <div class="form-group">
                     <input type="text" name="nis" class="form-control" placeholder="NIS">
                     <?= form_error('nis','<small class="text-danger pl-3">','</small>'); ?>
                   </div>
                   <div class="form-group">
                     <input type="text" name="nama" class="form-control" placeholder="Nama">
                     <?= form_error('nama','<small class="text-danger pl-3">','</small>'); ?>
                   </div>
                   <div class="form-group">
                     <input type="text" name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir">
                     <?= form_error('tgl_lahir','<small class="text-danger pl-3">','</small>'); ?>
                   </div><!-- 
                   <div class="form-group">
                     <input type="text" name="kelas" class="form-control" placeholder="Kelas">
                     <?= form_error('kelas','<small class="text-danger pl-3">','</small>'); ?>
                   </div> -->
                    <div class="form-group">
                      <select class="form-control" id="kelas" name="kelas">
                          <option selected>Pilih Kelas</option>
                        <?php foreach($kelas as $k) : ?>
                          <option value="<?= $k['kelas'] ?>"><?= $k['kelas']; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                   <div class="form-group">
                     <input type="text" name="token" class="form-control" placeholder="Token">
                     <?= form_error('token','<small class="text-danger pl-3">','</small>'); ?>
                   </div>
                   <button type="submit" class="btn btn-primary">Tambah Data</button>
                   <a href="<?= base_url('Moderator/voters') ?>" class="btn btn-warning">Kembali</a>
                 </form>
                </div>
              </div>
            </div>
          </div>
          

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
