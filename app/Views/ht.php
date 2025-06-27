<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid ml-3">

                    <!-- Page Heading -->
                     
                    <h3 class="h4 mb-2 text-dark"><b> Perbaikan Radio HT </b></h3>

                    <hr class="sidebar-divider border-secondary">
          
                    <div class="row">
                        <div class="col-lg-10"> 
                          
       <a href="/ht/create" class="btn btn-outline-secondary mb-1 btn-sm"><i class="fas fa-plus text-sm"></i> DATA</a>                 
              <?php if(session()->getFlashdata('pesan')) : ?>     
        <div class="alert alert-success" role="alert">
<b> <?= session()->getFlashdata('pesan'); ?> </b>
</div>
 <?php endif ?>  

<table class="table table-bordered table-striped table-sm">
  <thead class="thead-outline-dark">
      <tr>
      <th scope="col">No.</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Dokumentasi</th>
      <th scope="col">Merk</th>
      <th scope="col">Type</th>
      <th scope="col">Serial Number</th>
      <th scope="col">Catatan</th>
      <th scope="col">Rincian</th>
    </tr>
    
  </thead> 
  <tbody class="table-group-divider">
    <?php $i =1; ?>
    <?php foreach($ht as $h) : ?>
     <tr>
      <th scope="row"><?=$i++; ?></th>
      <td><?= $h['date']; ?></td>
      <td><img src="/img/<?= $h['keterangan']; ?>" alt="" class="doc" ></td>
      <td><?= $h['tanggal']; ?></td>
      <td><?=$h['lokasi']; ?></td>
      <td><?= $h['slug']; ?></td>
      <td><?=$h['status']; ?></td>
      <td>
        <a href="/ht/<?= $h['slug']; ?>" class="btn btn-outline-secondary btn-sm text-secondary ">Detail</a>
      </td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>
                        </div>
                    </div>
                </div>
<?= $this->endSection(); ?>



