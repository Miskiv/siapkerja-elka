<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    use HasFactory;
    protected $table = 'master_pertanyaan';
    protected $guarded = [];

    public function Kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'kriteria_id', 'id')->withDefault('-');
    }
}
