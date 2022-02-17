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

    /**
     * Scope a query to only include popular users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch($query, array $keywords)
    {
        $query->when( $keywords['search'] ?? false, function( $query, $search) {
            return $query->where('judul', 'like', '%'. $search . '%' )
                         ->orWhere('isi', 'like', '%' . $search . '%' )
                         ->orWhere('nama_file', 'like', '%' . $search . '%' );
        });
    }
}
