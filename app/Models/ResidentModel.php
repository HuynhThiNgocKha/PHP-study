<?php
namespace App\Models;
use CodeIgniter\Model;
 class ResidentModel extends Model{
    protected $table = "resident";
    protected $primaryKey = "id";
    protected $returnType = "array";
    protected $useSoftDeletes = true;
    protected $updatedField  = 'updated_at';
    protected $allowedFields = ["resident_name","gender","birth","phone","email","create_at","update_at"];
 }