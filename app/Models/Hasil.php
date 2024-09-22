<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    use HasFactory;
    protected $table = 'hasil';
    protected $guarded = [];

    public function Detail()
    {
        return $this->hasMany(Detail::class, 'hasil_id', 'id');
    }

    public function Kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'kriteria_id', 'id');
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function KriteriaSub()
    {
        return $this->belongsTo(KriteriaSub::class, 'kriteria_unggul', 'id');
    }
}
