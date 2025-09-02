<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<div class="container-fluid">
    <h3 class="h4 mb-2 text-gray-700"><b> Import Sparepart </b></h3>

    <?php if(session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error'); ?></div>
    <?php endif; ?>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
    <?php endif; ?>

    <div class="card shadow mb-4">
        <div class="card-body">
    <form action="<?= base_url('sparepart/importExcel'); ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field(); ?>

    <div class="form-group">
        <label for="file_excel">Pilih File Excel</label>
        <input type="file" name="file_excel" id="file_excel" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success">
        <i class="fas fa-file-excel"></i> Import
    </button>
</form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
