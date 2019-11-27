
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
         
          <div class="row">
            <div class="col-md-6">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Form Tambah Data Kelas</h6>
                </div>
                <div class="card-body">
                 <form action="<?= base_url('Kelas/add_kelas'); ?>" method="post">
                   <div class="form-group">
                     <input type="text" name="kelas" class="form-control" placeholder="Kelas">
                   </div>
                   <div class="form-group">
                     <input type="text" name="jumlah" class="form-control" placeholder="Jumlah">
                   </div>
                   <div class="form-group">
                     <input type="text" name="token" class="form-control" placeholder="Token">
                   </div>
                   <button type="submit" class="btn btn-primary">Tambah Data</button>
                   <a href="<?= base_url('Kelas'); ?>" class="btn btn-warning">Kembali</a>
                 </form>
                </div>
              </div>
            </div>
          </div>
          

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
