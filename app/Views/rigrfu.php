<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid ml-3">

                    <!-- Page Heading -->
                     
                    <h3 class="h4 mb-2 text-dark"><b> Radio Rig Stock Bagus </b></h3>

                    <div class="row">
                 <div class="col-lg-11"> 
             <form action="" method="get" class="d-inline">             
     <div class="input-group mb-3 input-group-sm">
  <input type="text" class="form-control " placeholder="Masukkan keyword pencarian" name="keyword">
  <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="submit" name="submit" ><i class="fas fa-search"></i></button>
  </div>
</div>
</form> 
 <hr class="sidebar-divider border-secondary">
                           
       <a href="/rigrfu/create" class="btn btn-lg btn-outline-secondary mb-1 btn-sm " aria-disabled="">Tambah data</a>                 
             <?php if(session()->getFlashdata('pesan')) : ?>     
        <div class="alert alert-success alert-sm" role="alert">
<b> <?= session()->getFlashdata('pesan'); ?> </b>
</div>

 <?php endif ?>  
<div class="table-responsive">
<table class="table table-striped table-bordered table-sm">
  <thead class="thead-outline-dark">
      <tr>
      <th scope="col">No.</th>
      <th scope="col">Dokumentasi</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Merek</th>
      <th scope="col">Tipe</th>
      <th scope="col">Nomor Seri</th>
      <th scope="col">Kelengkapan</th>
      <th scope="col">Rincian</th>
    </tr>
    
  </thead> 
  <tbody class="table-group-divider">
    <?php $i =1 + (5 * ($currentPage - 1)); ?>
    <?php foreach($rigrfu as $r) : ?>
     <tr>
      <th scope="row"><?=$i++; ?></th>
      <td><img src="/uploads/<?= $r['keterangan']; ?>" alt="" class="doc" ></td>
      <td><?= $r['date']; ?></td>
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
<?= $pager->links('rigrfu', 'ci4app_pagination'); ?>

                        </div>
                    </div>
                </div>
<?= $this->endSection(); ?>



