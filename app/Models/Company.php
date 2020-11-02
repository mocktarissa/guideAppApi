<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Company extends Model
{
    use HasFactory;
    // In contrary of categroies the company plurial is not automatically set
    protected $table = 'companys';
    protected $guarded = [];
    public function getLogoAttribute()
    {

        return $this->attributes['logo'];
    }
}
