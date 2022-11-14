<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>


<div class="container">
  <div class="row mt-3">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header text-center">
          <h5>Insert New Mahasiswa Into Database</h5>
        </div>
        <div class="card-body">
          <form action="/mahasiswa/save" method="post">
            <?= csrf_field(); ?>
            <div class="form-group">
              <label for="npm">NPM</label>
              <input type="text" name="npm"
                class="form-control <?= ($validation->hasError('npm')) ? 'is-invalid' : ''; ?>" id="npm" autofocus
                value="<?= old('npm'); ?>">
              <div class="invalid-feedback">
                <?= $validation->getError('npm'); ?>
              </div>
            </div>

            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" name="nama"
                class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama"
                value="<?= old('nama'); ?>">
              <div class="invalid-feedback">
                <?= $validation->getError('nama'); ?>
              </div>
            </div>

            <div class="form-group">
              <label for="jurusan">Jurusan</label>
              <input type="text" name="jurusan"
                class="form-control <?= ($validation->hasError('jurusan')) ? 'is-invalid' : ''; ?>" id="jurusan"
                value="<?= old('jurusan'); ?>">
              <div class="invalid-feedback">
                <?= $validation->getError('jurusan'); ?>
              </div>
            </div>

            <div class="form-group">
              <label for="fakultas">Fakultas</label>
              <input type="text" name="fakultas"
                class="form-control <?= ($validation->hasError('fakultas')) ? 'is-invalid' : ''; ?>" id="fakultas"
                value="<?= old('fakultas'); ?>">
              <div class="invalid-feedback">
                <?= $validation->getError('fakultas'); ?>
              </div>
            </div>

            <div class="form-group">
              <label for="hp">No HP</label>
              <input type="text" name="hp"
                class="form-control <?= ($validation->hasError('hp')) ? 'is-invalid' : ''; ?>" id="hp"
                value="<?= old('hp'); ?>">
              <div class="invalid-feedback">
                <?= $validation->getError('hp'); ?>
              </div>
            </div>

            <button class="btn btn-primary mt-3 float-end" type="submit" name="submit">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>