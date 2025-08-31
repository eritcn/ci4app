<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

                    <!-- Page Heading -->
                    <h3 class="h3 mb-4 text-info"><b> User List </b></h3>
                    <div class="row">
                        <div class="col-lg-11">
<div class="table-responsive">                         
<table class="table table-bordered table-striped table-sm">
  <thead class="th text-dark th-sm">
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Role</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1; ?>
<?php foreach($users as $user) : ?>
    <tr>
      <th scope="row"><?= $i++; ?></th>
      <td><?= $user->username; ?></td>
      <td><?= $user->email; ?></td>
      <td><?= $user->name; ?></td>
      <td>
        <a href="<?= base_url('admin/' . $user->userid); ?>" class="btn btn-info btn-sm">detail</a>
      </td>
   
    
    </tr>
 <?php endforeach; ?>
  </tbody>
</table> 
</div> 
                        </div>
                    </div>
                </div>
<?= $this->endSection(); ?>