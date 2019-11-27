
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
                 <form action="" method="post">
                  <input type="hidden" name="id" value="<?= $kelas['id']; ?>">
                   <div class="form-group">
                     <input type="text" name="kelas" class="form-control" value="<?= $kelas['kelas']; ?>">
                     <?= form_error('kelas','<small class="text-danger pl-3">','</small>'); ?>
                   </div>
                   <div class="form-group">
                     <input type="text" name="jumlah" class="form-control" value="<?= $kelas['jumlah']; ?>">
                     <?= form_error('jumlah','<small class="text-danger pl-3">','</small>'); ?>
                   </div>
                   <div class="form-group">
                     <input type="text" name="token" class="form-control" value="<?= $kelas['token']; ?>">
                     <?= form_error('token','<small class="text-danger pl-3">','</small>'); ?>
                   </div>
                   <button type="submit" class="btn btn-primary">Edit Data</button>
                   <a href="<?= base_url('Kelas') ?>" class="btn btn-warning">Kembali</a>
                 </form>
                </div>
              </div>
            </div>
          </div>
          

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
