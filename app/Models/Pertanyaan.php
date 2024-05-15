<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    use HasFactory;
    protected $table = 'master_pertanyaan';
    protected $guarded = [];

    public function TipeKriteria()
    {
        return $this->belongsTo(TipeKriteria::class, 'kriteria_id', 'id')->withDefault('-');
    }
}
