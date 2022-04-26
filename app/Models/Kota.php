<?php

namespace App\Models;

use App\Models\User;
use App\Models\Cabdin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kota extends Model
{
    use HasFactory;
    protected $table = 'kota';
    protected $fillable = [
        'nama_kota'
    ];

    public function cabdin() {
        return $this->belongsTo(Cabdin::class);
    }

    public function users() {
        return $this->hasMany(User::class);
    }
}
