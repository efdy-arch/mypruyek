<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiM extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_transaksi';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id',
        'id_user',
        'nama_klien',
        'no_telpon',
        'provinsi',
        'kota',
        'alamat',
        'alamat_detail',
        'kode_pos',
        'nama_produk',
        'gambar_produk',
        'harga',
        'jumlah',
        'total_harga',
        'metode_pembayaran',
        'created_at',
        'status',
        'status_pembayaran',
        'updated_at',
        'deleted_at'
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
    public function getTransaksi()
    { {
            return $this->orderBy('status_pembayaran', 'DESC')->findAll();
        }
    }
    public function getDetail($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
    public function getApprovedTransaksi($id = false)
    {
        if ($id === false) {
            return $this->where(['status' => 'Approved'])->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
    public function getPesananUser($id_user = null)
    {
        if ($id_user !== null) {
            return $this->where('id_user', $id_user)->findAll();
        } else {
            return null;
        }
    }
    public function getHapus($id = false)
    {
        return $this->where('id', $id)->delete();
    }
    public function getPembayaran($id = false)
    {
        return $this->where('id', $id)->first();
    }
    public function getBayar()
    {
    }
}
