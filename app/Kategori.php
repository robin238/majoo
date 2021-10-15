<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $dates = ['deleted_at'];
    protected $fillable = ['id', 'nama_kategori'];
    public $incrementing = false;
    protected $primaryKey = 'id';
    public $timestamps = false;


    public static function id()
    {
        $kode = DB::table('kategori')->max('id');
        //string to int
        $urutan = (int) substr($kode, 3, 3);
        $urutan++;

        $huruf = "KAT";
        $kodekategori = $huruf . sprintf("%03s", $urutan);
        return $kodekategori;
    }

    public function product()
    {
        return $this->hasMany('App\Product');
    }
}