<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'barang_id';
    protected $allowedFields = ['nama_produk', 'kategori', 'deskripsi_produk', 'user_id'];

    public function updateBarang($id, $data)
    {
        return $this->update($id, $data);
    }

    public function getBarangById($id)
    {
        return $this->find($id);
    }

    public function getBarang()
    {
        return $this->findAll();
    }
 
    public function getBarangsByUserId($userId, $itemsPerPage, $currentPage, $orderBy = 'id', $order = 'DESC')
    {
        $offset = ($currentPage - 1) * $itemsPerPage;

        $query = $this->db->table('barang')
            ->select('barang.*, images.image_url, auction.starting_price, auction.end_time')
            ->join('images', 'images.barang_id = barang.barang_id', 'left')
            ->join('auction', 'auction.barang_id = barang.barang_id', 'left')
            ->where('barang.user_id', $userId)
            ->limit($itemsPerPage, $offset)
            ->orderBy($orderBy, $order)
            ->get();

        return $query->getResultArray();
    }

    public function getTotalBarangsByUserId($userId)
    {
        return $this->where('user_id', $userId)->countAllResults();
    }

    public function getBarangsByUserIdPaginated($userId, $itemsPerPage, $currentPage, $includeUserId = false)
    {
        $offset = ($currentPage - 1) * $itemsPerPage;
        $builder = $this->builder()
            ->select('barang_id, nama_produk, deskripsi_produk, user_id')
            ->where('user_id', $userId)
            ->orderBy('kategori', 'DESC')
            ->limit($itemsPerPage, $offset);

        if ($includeUserId) {
            $builder->select('user_id');
        }

        return $builder->get()->getResultArray();
    }

    public function getBarangsByKategoriPaginated($kategori, $itemsPerPage, $currentPage)
    {
        $offset = ($currentPage - 1) * $itemsPerPage;
        return $this->where('kategori', $kategori)
            ->paginate($itemsPerPage, 'default', $currentPage);
    }

    public function getTotalBarangsByUserIdAndKategori($userId, $kategori = null)
    {
        return $this->where('user_id', $userId)
            ->where('kategori', $kategori)
            ->countAllResults();
    }

    public function getBarangsByKategori($kategori)
{
    return $this->where('kategori', $kategori)->findAll();
}

    public function getBarangsByUserIdAndKategoriPaginated($userId, $itemsPerPage, $currentPage, $kategori = null)
    {
        $offset = ($currentPage - 1) * $itemsPerPage;

        $query = $this->table('barang')
            ->select('barang.*, images.image_url, auction.starting_price')
            ->join('images', 'images.barang_id = barang.barang_id', 'left')
            ->join('auction', 'auction.barang_id = barang.barang_id', 'left')
            ->where('barang.user_id', $userId)
            ->where('barang.kategori', $kategori)
            ->limit($itemsPerPage, $offset)
            ->orderBy('barang.barang_id', 'DESC')
            ->get();

        return $query->getResultArray();
    }

    public function getTotalBarangsByKategori($kategori)
    {
        return $this->where('kategori', $kategori)->countAllResults();
    }

    public function auction()
    {
        return $this->hasOne(AuctionModel::class, 'barang_id', 'barang_id');
    }
}
