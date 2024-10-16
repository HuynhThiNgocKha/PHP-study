<?php

namespace App\Models;
use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products';  
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'description'];

    public function search($keyword)
    {
        return $this->like('name', $keyword)
                    ->orLike('description', $keyword)
                    ->findAll();
    }
}
