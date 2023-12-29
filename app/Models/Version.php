<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Version extends Model
{
    use HasFactory;

    protected $table = 'version';

    protected $guarded = [];

    /**
     * Get the version detail.
     */
    public function version_detail()
    {
        return $this->hasMany(VersionDetail::class, 'id_version');
    }
}
