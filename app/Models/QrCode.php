<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Poi;

class QrCode extends Model
{
    use HasFactory;
    public function poi()
    {
        return $this->belongsTo(Poi::class);
    }
}
