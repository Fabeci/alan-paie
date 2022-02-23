<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LicenciementPersonnel extends Model
{
    use HasFactory;

    public function licenciement()
    {
        return $this->morphOne(Licenciement::class, 'licenciable');
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
