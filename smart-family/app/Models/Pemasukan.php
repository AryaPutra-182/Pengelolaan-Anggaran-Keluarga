<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_pemasukan';
    public $incrementing = false;
    protected $table = 'pemasukans';
    protected $fillable = [
        'tanggal',
        'jumlah',  
        'asaldana',         
    ];
}

