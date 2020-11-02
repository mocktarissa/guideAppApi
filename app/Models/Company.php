<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    // In contrary of categroies the company plurial is not automatically set
    protected $table = 'companys';
    protected $guarded = [];
    public function getLogoAttribute($value)
    {

        return asset($value ?: '/test.png');
    }
}
