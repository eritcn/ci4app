<?php 
namespace App\Models;

use CodeIgniter\Model;

class ModelReady extends Model {
    protected $table = "ready";
    protected $primaryKey ="id";
    protected $allowedFields = ['id','merk','type','serialnumber','notes','condition'];
   
}