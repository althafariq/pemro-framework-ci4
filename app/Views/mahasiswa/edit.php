<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
  <div class="row mt-3">
    <div class="col-md-6 mx-auto">
      <div class="card">
        <div class="card-header text-center">
          <h5>Edit Existing Data Mahasiswa</h5>
        </div>
        <div class="card-body">
          <form action="/mahasiswa/update/<?= $mahasiswa['npm']; ?>" method="post">
            <?= csrf_field(); ?>
            <input type="hidden" name="npm" value="<?= $mahasiswa['npm'] ?>">
            <div class="form-group">
              <label for="npm">NPM</label>
              <input type="text" name="npm" class="form-control" id="npm" placeholder="<?php echo $mahasiswa['npm'] ?>"
                disabled>
              <div id="passwordHelpBlock" class="form-text mb-1">NPM can't be edited</div>
            </div>

            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" name="nama"
                class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama"
                value="<?= (old('nama')) ? old('nama') : $mahasiswa['nama'] ?>" autofocus>
              <div class="invalid-feedback">
                <?= $validation->getError('nama'); ?>
              </div>
            </div>

            <div class="form-group">
              <label for="jurusan">Jurusan</label>
              <input type="text" name="jurusan"
                class="form-control <?= ($validation->hasError('jurusan')) ? 'is-invalid' : ''; ?>" id="jurusan"
                value="<?= (old('jurusan')) ? old('jurusan') : $mahasiswa['jurusan']  ?>">
              <div class="invalid-feedback">
                <?= $validation->getError('jurusan'); ?>
              </div>
            </div>

            <div class="form-group">
              <label for="fakultas">Fakultas</label>
              <input type="text" name="fakultas"
                class="form-control <?= ($validation->hasError('fakultas')) ? 'is-invalid' : ''; ?>" id="fakultas"
                value="<?= (old('fakultas')) ? old('fakultas') : $mahasiswa['fakultas']  ?>">
              <div class="invalid-feedback">
                <?= $validation->getError('fakultas'); ?>
              </div>
            </div>

            <div class="form-group">
              <label for="hp">No HP</label>
              <input type="text" name="hp"
                class="form-control <?= ($validation->hasError('hp')) ? 'is-invalid' : ''; ?>" id="hp"
                value="<?= (old('hp')) ? old('hp') : $mahasiswa['hp']  ?>">
              <div class="invalid-feedback">
                <?= $validation->getError('hp'); ?>
              </div>
            </div>

            <button class="btn btn-primary mt-3 float-end" type="submit" name="submit">Update</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>