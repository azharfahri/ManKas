<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemasukan extends Model
{
    use HasFactory;
    protected $fillable = ['id','tipe','deskripsi','jumlah','id_dana'];
    public $timestamp = true;


    public function dana (){
        return $this->belongsTo(dana::class, 'id_dana');
    }
}
