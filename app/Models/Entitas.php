<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entitas extends Model
{
    use HasFactory;

    protected $table = 'entitas';

    protected $guarded = [];

    /**
     * Get the user.
     */
    public function user()
    {
        return $this->hasMany(User::class, 'kode_entitas', 'kode_entitas')->withDefault('-');
    }

    /**
     * Get the entitas.
     */
    public function activity()
    {
        return $this->hasMany(Activity::class, 'kode_entitas', 'kode_entitas')->withDefault('-');
    }

    /**
     * Get the master_industri.
     */
    public function master_industri()
    {
        return $this->belongsTo(MasterIndustri::class, 'kode_industri', 'kode_industri');
    }
}
