<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;
    protected $table = 'master_kriteria';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->withDefault('-');
    }

    public function kriteriaSub()
    {
        return $this->hasMany(KriteriaSub::class, 'kriteria_id', 'id');
    }
}
