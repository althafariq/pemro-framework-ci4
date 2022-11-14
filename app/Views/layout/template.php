<!-- header -->
<header>
  <div class="container">
    <div class="row">
      <div class="col py-5">
        <?= $this->include('layout/header'); ?>
      </div>
    </div>
  </div>
</header>

<!-- body content -->
<div class="container">
  <div class="row">
    <div class="col">
      <?= $this->renderSection('content'); ?>
    </div>
  </div>
</div>

<!-- footer -->
<?= $this->include('layout/footer'); ?>