<?php

namespace App\Models;

use CodeIgniter\Model;

class HalamanProdukM extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'produk';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_produk', 'foto', 'foto2', 'foto3', 'foto4', 'harga', 'deskripsi', 'created_at', 'updated_at', 'harga', 'kuantitas', 'kategori'];

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
    public function getProduk()
    { {
            return $this->orderBy('created_at', 'DESC')->findAll();
        }
    }
    public function getDetailProduk($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first(); // Mengambil data produk berdasarkan slug
    }
    public function getCari($search)
    {
        return $this->db->table('produk')->like('nama_produk', $search)
            ->orLike('kategori', $search)
            ->orLike('slug', $search)
            ->get()
            ->getResultArray();
    }
}
