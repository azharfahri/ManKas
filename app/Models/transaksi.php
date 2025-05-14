<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    protected $fillable = ['id','tipe','deskripsi','jumlah','id_dana','id_user','tanggal'];
    public $timestamp = true;


    public function dana (){
        return $this->belongsTo(dana::class, 'id_dana');
    }
    public function user(){
        return $this->belongsTo(user::class, 'id_user');
    }
}
