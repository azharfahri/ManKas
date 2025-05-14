<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dana extends Model
{
    use HasFactory;
    protected $fillable = ['id','nama_dana','saldo','id_user'];
    public $timestamp = true;

    public function pemasukan (){
    return $this->hasMany(pemasukan::class);
}

    public function pengeluaran (){
    return $this->hasMany(pengeluaran::class);
}

public function user (){
        return $this->belongsTo(user::class, 'id_user');
    }

}
