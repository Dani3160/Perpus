<?php

namespace App\Imports;

use App\Model\DataMaster\Biblio;
use Maatwebsite\Excel\Concerns\ToModel;

class BiblioImport implements ToModel
{
	/**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Biblio([
        'biblio_id' => $row[0],
        'judul' => $row[1],
        'edisi' => $row[2],
        'penulis_id' => $row[3],
        'isbn' => $row[4],
        'penerbit_id' => $row[5],
        'harga_buku' => $row[6],
        'penerbit_tahun' => $row[7],
        'penerbit_tempat' => $row[8],
        'deskripsi' => $row[9],
        'tipekoleksi_id' => $row[10],
        'klasifikasi_id' => $row[11],
        'gambar' => $row[12],
        'lampiran' => $row[13],
        'promosi' => $row[14],
        'publik' => $row[15],
        'panggil' => $row[16],
        'eksemplar' => $row[17],
        'status_item_id' => $row[18],
        'sumber_item_id' => $row[19],
        'terhapus' => $row[20],
        'pembuatan' => $row[21],
        'perubahan' => $row[22],
      ]);  
    }
}
