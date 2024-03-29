<?php

namespace App\Models;

use CodeIgniter\Model;

class TambahProdukM extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'produk';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama_produk',
        'kuantitas',
        'harga',
        'deskripsi',
        'kategori',
        'created_at',
        'updated_at',
        'deleted_at',
        'slug',
        'created_at',
        'updated_at',
        'deleted_at',
        'foto',
        'foto2',
        'foto3',
        'foto4',
    ];

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
}
