<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutbondLogistic extends Model
{
    use HasFactory;

    protected $appends = ['opname','material'];

    function getOpnameAttribute(){
        return StockOpname::find($this->id_opname);
    }
    function getMaterialAttribute(){
        return Material::find($this->id_material);
    }
}
