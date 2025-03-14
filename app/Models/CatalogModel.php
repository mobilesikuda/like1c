<?php

namespace App\Models;

use CodeIgniter\Model;

class CatalogModel extends Model
{
    protected $table            = 'catalogs';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'name', 'title'
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    /**
     *
     * @param string $strFind
     * @return CatalogModel
     */
    public function getList(string $strFind=""): static
    {
        if($strFind !== ""){
          $this->orLike('name', $strFind); 
          $this->orLike('title', $strFind);  
        } 
        return $this;
    } 
    
    public function getById(int $id)
    {
        return $this->where(['id' => $id])->first();
    }
    
    public function deleteById(int $id){
        
        return $this->delete([$id]);
            
    }
}
