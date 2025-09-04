<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h3 class="h4 mb-2 text-gray-700"><b> List Stock Sparepart </b></h3>

    <div class="row">
        <div class="col-lg-11"> 
            <!-- Search -->
            <form action="" method="get" class="d-inline">   
                <div class="input-group mb-3 input-group-sm">
                    <input type="text" class="form-control" 
                           placeholder="Cari info stock sparepart, ketik disini gaes..." 
                           name="keyword" value="<?= esc($keyword ?? '') ?>">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" name="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>     

            <hr class="sidebar-divider border-secondary">   

            <!-- Tombol tambah -->
            <a href="/sparepart/create" class="btn bg-success text-white mb-1 btn-sm"><b> Tambah List </b></a>  

            <!-- Flash Messages -->
            <?php if(session()->getFlashdata('pesan')) : ?>     
                <div class="alert alert-success" role="alert">
                    <b><?= session()->getFlashdata('pesan'); ?></b>
                </div>
            <?php endif ?>   
            <?php if(session()->getFlashdata('error')) : ?>     
                <div class="alert alert-danger" role="alert">
                    <b><?= session()->getFlashdata('error'); ?></b>
                </div>
            <?php endif ?>   

            <!-- Table -->
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <!-- <th>Dokumen Gambar</th> -->
                            <th>Nama Sparepart</th>
                            <th>Kode Sparepart</th>
                            <th>Stock West</th>
                            <th>Stock East</th>
                            <th>Last Update</th>
                            <th>Rincian</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php $i = 1 + (6 * ($currentPage - 1)); ?>
                        <?php foreach($sparepart as $s) : ?>
                            <?php
                                $limit = 5;
                                $stokWestLimit = $s['stok_west'] <= $limit;
                                $stokEastLimit = $s['stok_east'] <= $limit;
                            ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <!-- <td>
                                    <?php if(!empty($s['gambar_dokumen'])): ?>
                                        <img src="/uploads/<?= esc($s['gambar_dokumen']); ?>" alt="" class="doc">
                                    <?php else: ?>
                                        <span class="text-muted">No Image</span>
                                    <?php endif; ?>
                                </td> -->
                                <td><?= esc($s['nama_sparepart']); ?></td>
                                <td><?= esc($s['kode_sparepart']); ?></td>

                                <td class="<?= $stokWestLimit ? 'text-danger font-weight-bold' : 'text-success font-weight-bold' ?>">
                                    <?= esc($s['stok_west']); ?>
                                    <?php if ($stokWestLimit): ?>
                                        <span class="badge bg-danger text-white rounded-0">⚠ Limit</span>
                                    <?php endif; ?>
                                </td>

                                <td class="<?= $stokEastLimit ? 'text-danger font-weight-bold' : 'text-success font-weight-bold' ?>">
                                    <?= esc($s['stok_east']); ?>
                                    <?php if ($stokEastLimit): ?>
                                        <span class="badge bg-danger text-white rounded-0">⚠ Limit</span>
                                    <?php endif; ?>
                                </td>

                                <td><?= $s['updated_at'] ?? '-' ?></td>
                                <td>
                                    <a href="/sparepart/<?= $s['id']; ?>" class="btn bg-dark btn-sm text-gray-300">Detail</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <?= $pager->links('sparepart', 'ci4app_pagination'); ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
