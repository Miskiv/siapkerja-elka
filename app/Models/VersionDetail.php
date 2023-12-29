<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VersionDetail extends Model
{
    use HasFactory;

    protected $table = 'version_details';

    protected $guarded = [];

    /**
     * Get the version.
     */
    public function version()
    {
        return $this->belongsTo(Version::class, 'id_version');
    }
}
