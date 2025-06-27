<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid ml-3">

                    <!-- Page Heading -->
                     
                    <h3 class="h4 mb-2 text-dark"><b> Radio Rig Stock Bagus </b></h3>

                    <hr class="sidebar-divider border-secondary">
          
                    <div class="row">
                        <div class="col-lg-10"> 
                          
       <a href="/rigrfu/create" class="btn btn-lg btn-outline-secondary mb-1 btn-sm" aria-disabled=""><i class="fas fa-plus text-sm"></i> DATA</a>                 
             <?php if(session()->getFlashdata('pesan')) : ?>     
        <div class="alert alert-success" role="alert">
<b> <?= session()->getFlashdata('pesan'); ?> </b>
</div>
 <?php endif ?>  

<table class="table table-striped table-bordered table-sm">
  <thead class="thead-outline-dark">
      <tr>
      <th scope="col">No.</th>
      <th scope="col">Tanggal Update</th>
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
    <?php foreach($rigrfu as $r) : ?>
     <tr>
      <th scope="row"><?=$i++; ?></th>
      <td><?= $r['date']; ?></td>
      <td><img src="/img/<?= $r['keterangan']; ?>" alt="" class="doc" ></td>
      <td><?= $r['tanggal']; ?></td>
      <td><?=$r['lokasi']; ?></td>
      <td><?= $r['slug']; ?></td>
      <td><?=$r['status']; ?></td>
      <td>
        <a href="/rigrfu/<?= $r['slug']; ?>" class="btn btn-outline-secondary btn-sm text-secondary ">Detail</a>
      </td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>
                        </div>
                    </div>
                </div>
<?= $this->endSection(); ?>



