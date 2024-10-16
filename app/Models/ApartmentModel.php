<?php
namespace App\Models;
use CodeIgniter\Model;
 class ApartmentModel extends Model{
    protected $table = "apartment";
    protected $primaryKey = "id";
    protected $returnType = "array";
    protected $useSoftDeletes = true;
    protected $allowedFields = ["apart_name","area","quantity","status","price","create_at","update_at"];
 }