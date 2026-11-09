<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    use HasFactory;

    // KODE INI SEHARUSNYA DI SINI, BUKAN DI CONTROLLER
    protected $table = 'portofolios'; 
    
    protected $fillable = ['judul', 'deskripsi', 'gambar'];
}