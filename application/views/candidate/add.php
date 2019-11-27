
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
         
          <div class="row">
            <div class="col-md-8">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Form Tambah Data Candidate</h6>
                </div>
                <div class="card-body">
                 <form action="" method="post" enctype="multipart/form-data">
                   <div class="form-group row">
                    <label for="no_urut" class="col-sm-2 col-form-label">No Urut</label>
                    <div class="col-sm-10">
                      <input type="text" name="no_urut" class="form-control" id="no_urut" placeholder="No Urut">
                     <?= form_error('no_urut','<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                   </div>
                   <div class="form-group row">
                    <label for="nis" class="col-sm-2 col-form-label">Nis</label>
                    <div class="col-sm-10">
                      <input type="text" name="nis" class="form-control" id="nis" placeholder="Nis">
                     <?= form_error('nis','<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                   </div>
                   <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                      <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama">
                     <?= form_error('nama','<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                   </div>
                   <div class="form-group row">
                    <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                    <div class="col-sm-10">
                      <input type="text" name="kelas" class="form-control" id="kelas" placeholder="Kelas">
                     <?= form_error('kelas','<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                   </div>
                   <div class="form-group row">
                    <label for="motto" class="col-sm-2 col-form-label">Motto</label>
                    <div class="col-sm-10">
                      <input type="text" name="motto" class="form-control" id="motto" placeholder="Motto">
                     <?= form_error('motto','<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                   </div>
                   <div class="form-group row">
                    <div class="col-sm-2">Foto</div>
                    <div class="col-sm-6">
                      <input type="file" name="foto" id="foto" style="width: 380px; height: 30px; border-radius: 5px; border: 0.5px solid #b7b9cc;">
                    </div>
                   </div>
                   <button type="submit" class="btn btn-primary">Tambah Data</button>
                   <a href="<?= base_url('Candidate'); ?>" class="btn btn-warning">Kembali</a>
                 </form>
                </div>
              </div>
            </div>
          </div>
          

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
