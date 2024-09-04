<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubcontractorOffer extends Model
{
    use HasFactory;

    public function contracts()
    {
        return $this->hasMany(SubcontractorContract::class);
    }

    public function subcontractor()
    {
        return $this->belongsTo(Subcontractor::class);
    }
}
