
  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <?php if($info['sesi'] == 1) : ?>
                <div class="p-5">
                  <div class="text-center">
                    <img src="<?= base_url('assets/img/smecone.png') ?>" width="120" height="90">
                    <h1 class="h4 text-gray-900 mb-4">Masukan Token</h1>
                    <?= $this->session->flashdata('alert'); ?>
                  </div>
                  <form class="user" method="post" action="<?= base_url('Token'); ?>">
                    <div class="form-group">
                      <input type="text" name="token" class="form-control form-control-user <?= form_error('token') ? 'is-invalid':'' ?>" placeholder="Masukan Token" value="<?= set_value('token'); ?>">
                      <?= form_error('token','<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">Submit</button>
                  </form>
                  <hr>
                </div>
                  <?php else: ?>
                    <div class="p-5">
                      <div class="text-center">
                        <img src="<?= base_url('assets/img/smecone.png') ?>" width="120" height="90">
                        <h1 class="h4 text-danger mb-4">Sesi tidak aktif</h1>
                      </div>
                      <form class="user">
                        <fieldset disabled>
                          <div class="form-group">
                            <input type="text" name="token" class="form-control form-control-user" placeholder="Disable">
                          </div>
                        </fieldset>
                        <a href="<?= base_url('Token/back'); ?>" class="btn btn-danger btn-user btn-block">Kembali</a>
                      </form>
                      <hr>
                    </div>
                  <?php endif; ?>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
