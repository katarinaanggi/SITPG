<?php

namespace App\Models;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Berita extends Model
{
    public $table = "Berita";
    use HasFactory;
    protected $fillable = [
        'id_author',
        'judul',
        'isi',
        'nama_file',
        'file_path'
    ];

    public function admin() {
        return $this->belongsTo(Admin::class, 'id_author');
    }

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
