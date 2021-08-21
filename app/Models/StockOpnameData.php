<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockOpnameData extends Model
{
    use HasFactory;
    protected $appends = ['material'];

    function getMaterialAttribute()
    {
        return Material::find($this->id_material);
    }
}
