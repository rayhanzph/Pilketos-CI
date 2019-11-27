
  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                  <h1 class="h3 text-gray-900 mb-4">Pemilihan Ketua OSIS SMP N 4 Cepu Tahun 2019/2020</h1>
                    <img src="<?= base_url('assets/img/smecone.png') ?>" width="120" height="90">
                    <h1 class="h4 text-gray-900 mb-4">Silahkan Login</h1>
                    <?= $this->session->flashdata('alert'); ?>
                  </div>
                  <form class="user" method="post" action="<?= base_url('Auth'); ?>">
                    <div class="form-group">
                      <input type="number" name="nis" class="form-control form-control-user <?= form_error('nis') ? 'is-invalid':'' ?>" aria-describedby="emailHelp" placeholder="Masukan NIS/NIP" value="<?= set_value('nis'); ?>">
                      <?= form_error('nis','<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                    <div class="form-group">
                      <input type="date" name="tgl" class="form-control form-control-user <?= form_error('tgl') ? 'is-invalid':'' ?>" placeholder="Masukan Tanggal Lahir" value="<?= set_value('tgl'); ?>">
                      <?= form_error('tgl','<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                  </form>
                  <hr>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
