<?php

namespace App\Models;

use App\Models\Kota;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cabdin extends Model
{
    use HasFactory;
    protected $table = 'cabdin';
    protected $fillable = [
        'nama',
    ];

    public function kotas() {
        return $this->hasMany(Kota::class);
    }
}

