<?php
namespace App\Models;
use CodeIgniter\Model;
 class VehicleModel extends Model{
    protected $table = "vehicle";
    protected $primaryKey = "id";
    protected $returnType = "array";
    protected $useSoftDeletes = true;
    protected $updatedField  = 'updated_at';
    protected $allowedFields = ["resident_name", "brand", "category", "licese_plate", "duration", "in", "out", "create_at","update_at"];
 }