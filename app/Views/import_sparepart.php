<div class="container mt-4">
    <h3>Import Data Sparepart dari Excel</h3>
    <form action="<?= base_url('sparepart/importExcel'); ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="file_excel">Pilih File Excel</label>
            <input type="file" name="file_excel" id="file_excel" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success mt-2">Import</button>
    </form>
</div>
