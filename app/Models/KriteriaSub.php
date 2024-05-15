<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KriteriaSub extends Model
{
    use HasFactory;
    protected $table = 'master_kriteria_sub';
    protected $guarded = [];

    public function Kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'kriteria_id', 'id')->withDefault('-');
    }

    public function kriteriaSub2()
    {
        return $this->hasMany(KriteriaSub2::class, 'kriteria_sub_id', 'id');
    }
}
