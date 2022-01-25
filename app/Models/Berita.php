<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    public $table = "Berita";
    use HasFactory;
    protected $fillable = [
        'judul',
        'isi',
        'nama_file',
        'file_path'
    ];
}
