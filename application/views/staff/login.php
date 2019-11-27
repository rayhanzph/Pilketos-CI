
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
                    <img src="<?= base_url('assets/img/smecone.png') ?>" width="120" height="90">
                    <h1 class="h4 text-gray-900 mb-4">Login Staff</h1>
                  </div>
                  <?= $this->session->flashdata('alert'); ?>
                  <form class="user" method="post" action="<?= base_url('Staff'); ?>">
                    <div class="form-group">
                      <input type="text" name="username" class="form-control form-control-user <?= form_error('username') ? 'is-invalid':'' ?>" aria-describedby="emailHelp" placeholder="Username" value="<?= set_value('username'); ?>">
                      <?= form_error('username','<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user <?= form_error('password') ? 'is-invalid':'' ?>" placeholder="Password">
                      <?= form_error('password','<small class="text-danger pl-3">','</small>'); ?>
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
