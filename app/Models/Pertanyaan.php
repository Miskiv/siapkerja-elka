<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    use HasFactory;
    protected $table = 'pertanyaan';
    protected $guarded = [];

    public function TipeKriteria()
    {
        return $this->belongsTo(TipeKriteria::class, 'tipe_kriteria', 'id')->withDefault('-');
    }
}
