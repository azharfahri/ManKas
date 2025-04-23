<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = ['id','id_user','id_kategori','tipe_transaksi','jumlah','tanggal_transaksi','deskripsi'];
    public $timestamp = true;

    public function user (){
        return $this->belongsTo(user::class, 'id_user');
    }
    public function kategori (){
        return $this->belongsTo(kategori::class, 'id_kategori');
    }
}
