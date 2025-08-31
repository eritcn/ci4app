<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h4 class="mt-2"><b>Rincian Sparepart</b></h4>
            
            <div class="card mb-5" style="max-width: 780px;">
                <div class="row g-0">
                    <!-- Gambar Dokumen -->
                    <div class="col-md-6 mt-3 ml-3 mr-3 mb-3">
                        <img src="/uploads/<?= esc($database['gambar_dokumen']); ?>" 
                             style="width: 577px; height: auto;" 
                             class="img-fluid" 
                             alt="<?= esc($database['nama_sparepart']); ?>">
                    </div>

                    <!-- Detail Data -->
                    <div class="col-md mr-2">
                        <div class="card-body mr-2">
                            <?php
                                $limit = 5;
                                $westLimit = $database['stok_west'] <= $limit;
                                $eastLimit = $database['stok_east'] <= $limit;
                            ?>

                            <h5 class="card-title"><b><?= esc($database['kode_sparepart']); ?></b></h5>
                            <p class="card-text"><?= esc($database['detail_part']); ?></p>
                            <p class="card-text"><b>Nama Sparepart : </b> <?= esc($database['nama_sparepart']); ?></p>
                            
                            <!-- Stock West -->
                            <p class="card-text"><b>Stock West : </b>
                                <span class="<?= $westLimit ? 'text-danger font-weight-bold' : 'text-success font-weight-bold' ?>">
                                    <?= esc($database['stok_west']); ?> 
                                    <small><b><sup class="text-gray-800">Ea / Meter (kabel)</sup></b></small>
                                </span>
                                <?php if ($westLimit): ?>
                                    <span class="badge btn-danger rounded-1"> ⚠</span>
                                <?php endif; ?>
                            </p>
                            
                            <!-- Stock East -->
                            <p class="card-text"><b>Stock East : </b>
                                <span class="<?= $eastLimit ? 'text-danger font-weight-bold' : 'text-success font-weight-bold' ?>">
                                    <?= esc($database['stok_east']); ?> 
                                    <small><b><sup class="text-gray-800">Ea / Meter (kabel)</sup></b></small>
                                </span>
                                <?php if ($eastLimit): ?>
                                    <span class="badge btn-danger rounded-1"> ⚠</span>
                                <?php endif; ?>
                            </p>

                            <!-- Metadata -->
                            <p class="card-text"><b>Updated By : </b> <?= esc($database['updated_by']); ?></p>
                            <p class="card-text"><b>Last Update : </b> <?= esc($database['updated_at']); ?></p>
                            
                            <!-- Action Buttons -->
                            <a href="/sparepart/edit/<?= $database['id'] ?>" class="btn btn-dark btn-sm">Update</a>

                            <form action="/sparepart/<?= $database['id'] ?>" method="post" class="d-inline">
                                <?= csrf_field() ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" 
                                        class="btn btn-danger btn-sm" 
                                        onclick="return confirm('Apakah anda yakin menghapus data ini?');">Delete</button>
                            </form>

                            <br><br>
                            <a href="/sparepart"><small>&lt;&lt; Balik ke tabel stock sparepart</small></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
