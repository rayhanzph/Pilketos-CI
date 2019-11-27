
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
                  <input type="hidden" name="id" value="<?= $voters['id']; ?>">
                   <div class="form-group">
                     <input type="text" name="nis" class="form-control" placeholder="NIS" value="<?= $voters['nis']; ?>">
                     <?= form_error('nis','<small class="text-danger pl-3">','</small>'); ?>
                   </div>
                   <div class="form-group">
                     <input type="text" name="nama" class="form-control" placeholder="Nama" value="<?= $voters['nama']; ?>">
                     <?= form_error('nama','<small class="text-danger pl-3">','</small>'); ?>
                   </div>
                   <div class="form-group">
                     <input type="text" name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir" value="<?= $voters['tgl_lahir']; ?>">
                     <?= form_error('tgl_lahir','<small class="text-danger pl-3">','</small>'); ?>
                   </div>
                   <div class="form-group">
                     <input type="text" name="kelas" class="form-control" placeholder="Kelas" value="<?= $voters['kelas']; ?>">
                     <?= form_error('kelas','<small class="text-danger pl-3">','</small>'); ?>
                   </div>
                   <div class="form-group">
                     <input type="text" name="token" class="form-control" placeholder="Token" value="<?= $voters['token']; ?>">
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
