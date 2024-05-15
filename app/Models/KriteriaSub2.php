<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KriteriaSub2 extends Model
{
    use HasFactory;
    protected $table = 'master_kriteria_sub_sub';
    protected $guarded = [];

    public function KriteriaSub()
    {
        return $this->belongsTo(KriteriaSub::class, 'kriteria_sub_id', 'id')->withDefault('-');
    }
}
