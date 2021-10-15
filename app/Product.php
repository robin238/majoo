<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    protected $table = 'Product';
    protected $dates = ['deleted_at'];
    protected $fillable = ['id', 'id_kategori', 'nama_product', 'harga_product', 'deskripsi', 'path_image'];
    public $incrementing = false;
    protected $primaryKey = 'id';
    public $timestamps = false;

    public static function id()
    {
        $kode = DB::table('Product')->max('id');
        //string to int
        $urutan = (int) substr($kode, 3, 3);
        $urutan++;

        $huruf = "PRD";
        $kodeproduct = $huruf . sprintf("%03s", $urutan);
        return $kodeproduct;
    }

    public function kategori()
    {
        return $this->belongsTo('App\kategori');
    }
}