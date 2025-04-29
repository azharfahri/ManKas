<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengeluaran extends Model
{
    use HasFactory;
    protected $fillable = ['id','deskripsi','jumlah','id_dana'];
    public $timestamp = true;

    
    public function dana (){
        return $this->belongsTo(dana::class, 'id_dana');
    }
}
