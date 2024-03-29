<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TransaksiApproveModel;
use App\Models\TransaksiM;
use App\Filters\AuthFilter;
use App\Models\PembayaranModel;


class TransaksiC extends BaseController
{
    public function index()
    {
        $totalHarga = $this->request->getPost('harga') * $this->request->getPost('jumlah');
        $stok = $this->request->getPost('kuantitas') - $this->request->getPost('jumlah');
        $id = $this->request->getPost('id');
        $post = $this->request->getPost(['nama', 'id_user', 'nama_produk', 'foto', 'harga', 'jumlah', 'no_telpon', 'provinsi', 'kota', 'alamat', 'alamat_detail', 'kode_pos', 'metode_pembayaran', 'status', 'status_pembayaran']);

        $validationRules = [
            'nama' => 'required|max_length[255]|min_length[3]',
            'nama_produk' => 'required|max_length[255]|min_length[3]',
            'no_telpon' => 'required|max_length[255]|min_length[3]',
            'provinsi' => 'required|max_length[255]|min_length[3]',
            'kota' => 'required|max_length[255]|min_length[3]',
            'alamat'  => 'required|max_length[5000]|min_length[3]',
            'alamat_detail' => 'required|max_length[5000]|min_length[2]',
            'kode_pos' => 'required|max_length[5000]|min_length[4]',
            'metode_pembayaran' => 'required|max_length[5000]|min_length[3]',
            'harga' => 'required|max_length[5000]|min_length[1]',
        ];

        // Membuat objek validasi
        $validation = \Config\Services::validation();

        // Melakukan validasi
        if (!$validation->setRules($validationRules)->run($post)) {
            // Validasi gagal, mengirim pesan error ke tampilan
            $data['errors'] = $validation->getErrors();
            return view('Transaksi/index', $data);
        }

        // Validasi sukses, melanjutkan proses
        // ...
        $modelP = model(HalamanProdukM::class);
        $modelP->update(['id' => $id], ['kuantitas' => $stok]);


        $model = model(TransaksiM::class);

        $model->save([
            'nama_klien' => $post['nama'],
            'id_user' => $post['id_user'],
            'nama_produk' => $post['nama_produk'],
            'gambar_produk' => $post['foto'],
            'no_telpon' => $post['no_telpon'],
            'provinsi' => $post['provinsi'],
            'kota' => $post['kota'],
            'alamat' => $post['alamat'],
            'alamat_detail' => $post['alamat_detail'],
            'kode_pos' => $post['kode_pos'],
            'metode_pembayaran' => $post['metode_pembayaran'],
            'created_at' => date('Y-m-d H:i:s'),
            'harga' => $post['harga'],
            'jumlah' => $post['jumlah'],
            'total_harga' => $totalHarga,
            'status' => $post['status'],
            'status_pembayaran' => $post['status_pembayaran']
        ]);
        $session = session();
        $session->setFlashdata('success', 'Transaksi Berhasil! Cek status pesanan di halaman Pesananmu!');
        $data = [
            'produk' => $modelP->getProduk()
        ];
        return redirect()->back();
    }
    public function getProduk($id)
    {
        $barang = model(HalamanProdukM::class);
        $produk = [
            'produk' => $barang->getDetailProduk($id)
        ];
        return view('Transaksi/index', $produk);
    }
    public function transaksi()
    {
        $model = model(TransaksiM::class);
        $transaksi = [
            'transaksi' => $model->getTransaksi(),
            'title' => 'Tabel Transaksi'
        ];
        return view('Admin/TransaksiV', $transaksi);
    }
    public function detailtransaksi($id)
    {
        $model = model(TransaksiM::class);
        $transaksi = [
            'transaksi' => $model->getDetail($id),
            'title' => 'Detail Transaksi'
        ];
        return view('Admin/DetailTransaksi', $transaksi);
    }
    public function approvedTransaksi($id)
    {
        $model = model(TransaksiApproveModel::class);
        $transaksi = model(TransaksiM::class);
        $model->update($id, [
            'status' => 'Approved',
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $session = session();
        $session->setFlashdata('success', 'Status Transaksi Approved!');
        $data = [
            'title' => 'Detail Transaksi',
            'transaksi' => $transaksi->getDetail($id)
        ];
        return view('Admin/DetailTransaksi', $data);
    }
    // public function pesanan($id)
    // {

    //     $model = new TransaksiM();
    //     $transaksi = $model->getPesananUser($id);

    //     if ($transaksi !== null) {
    //         $data = [
    //             'title' => 'Pesananmu',
    //             'transaksi' => $transaksi
    //         ];

    //         return view('Transaksi/Pesanan', $data);
    //     } else {
    //         // Handle jika tidak ada data pesanan
    //         return 'Tidak ada pesanan yang ditemukan.';
    //     }
    // }
    public function pesanan($id_user)
    {
        // Tambahkan filter 'auth' pada method ini

        // Periksa autentikasi dan otorisasi pengguna menggunakan filter 'auth'

        $model = new TransaksiM();
        $transaksi = $model->getPesananUser($id_user);

        if ($transaksi !== null) {
            $data = [
                'title' => 'Pesananmu',
                'transaksi' => $transaksi
            ];

            return view('Transaksi/Pesanan', $data);
        } else {
            // Handle jika tidak ada data pesanan
            return 'Tidak ada pesanan yang ditemukan.';
        }
    }
    public function hapustransaksi($id)
    {
        $model = model(TransaksiM::class);
        $model->delete($id);
        $session = session();
        $session->setFlashdata('success', 'Transaksi Berhasil Dihapus!');
        $data = [
            'title' => 'Data Transaksi',
            'transaksi' => $model->getTransaksi()
        ];
        return view('Admin/TransaksiV', $data);
    }
    public function pembayaran($id)
    {
        $model = model(TransaksiM::class);
        $data = [
            'transaksi' => $model->getPembayaran($id),
            'title' => 'Form Pembayaran'
        ];
        return view('Transaksi/pembayaran', $data);
    }
    public function bayar($id)
    {
        $post = $this->request->getPost(['nama_produk', 'total_harga', 'nama_klien', 'id_transaksi']);
        $fileGambar = $this->request->getFile('bukti_pembayaran');

        if ($fileGambar && $fileGambar->isValid() && !$fileGambar->hasMoved()) {
            $newName = $fileGambar->getRandomName();
            $fileGambar->move(ROOTPATH . 'public/img', $newName);
        } else {
            $newName = 'default.jpg';
        }

        $model = new PembayaranModel();
        $model->save([
            'nama_produk' => $post['nama_produk'],
            'total_harga' => $post['total_harga'],
            'id_transaksi' => $post['id_transaksi'],
            'bukti_pembayaran' => $newName,
            'nama_klien' => $post['nama_klien'],
            'created_at' => date('Y-m-d H:i:s')
        ]);

        $modelT = model(TransaksiM::class);
        $modelT->update($id, [
            'status_pembayaran' => 'Approved',
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        // Mengambil data pembayaran berdasarkan ID
        $transaksi = $modelT->getPembayaran($id);

        $data = [
            'transaksi' => $transaksi,
            'title' => 'Form Pembayaran'
        ];

        $session = session();
        $session->setFlashdata('success', 'Pembayaran terkirim');
        return view('Transaksi/pembayaran', $data);
    }
    public function lihat_bukti($id)
    {
        $model = model(PembayaranModel::class);
        $data = [
            'bukti' => $model->find($id)
        ];
        return view('Transaksi/bukti_pembayaran', $data);
    }
}
