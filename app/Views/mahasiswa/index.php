<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<script>
function onButtonPress() {
  $('.alert').alert('close')
}
</script>

<div class="container mt-3">
  <div class="d-flex justify-content-between">
    <form action="" method="post">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search mahasiswa..." name="keyword">
        <button class="btn btn-primary" type="submit">Search</button>
      </div>
    </form>
    <div class="col-3">
      <?php if(session()->getFlashdata('message')) : ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('message'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"
          onclick="onButtonPress()"></button>
      </div>
      <?php endif; ?>
    </div>
    <div class="col-0.5">
      <a href="/mahasiswa/insert" class="btn btn-primary">Insert</a>
    </div>
  </div>
</div>

<div class="row mt-3">
  <h3>Daftar Mahasiswa</h3>
  <?php if( empty($mahasiswa)) : ?>
  <div class="alert alert-danger" role="alert">
    Data not found.
  </div>
  <?php endif; ?>

  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">NPM</th>
        <th scope="col">Nama</th>
        <th scope="col">Jurusan</th>
        <th scope="col">Fakultas</th>
        <th scope="col">No HP</th>
        <th scope="col">Email</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php 
            $i = 0;
            foreach ($mahasiswa as $mhs) :
            $i++; ?>
      <tr>
        <th scope="row"><?= $i; ?></th>
        <td><?= $mhs['npm'] ?></td>
        <td><?= $mhs['nama'] ?></td>
        <td><?= $mhs['jurusan'] ?></td>
        <td><?= $mhs['fakultas'] ?></td>
        <td><?= $mhs['hp'] ?></td>
        <td><?= $mhs['email'] ?></td>
        <td>
          <a href="/mahasiswa/edit/<?= $mhs['npm']; ?>" class="badge text-bg-info">Edit</a>

          <form action="/mahasiswa/<?= $mhs['npm']; ?>" method="post" class="d-inline">
            <?= csrf_field(); ?>
            <input type="hidden" name="_method" value="DELETE">
            <a href="/mahasiswa/delete/<?= $mhs['npm']; ?>" onclick="return confirm('Delete this mahasiswa?');"
              id="delete">
              <img src="/assets/img/close.png" id="deleteButton" width="16" height="16">
            </a>
          </form>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
</div>

<?= $this->endSection(); ?>