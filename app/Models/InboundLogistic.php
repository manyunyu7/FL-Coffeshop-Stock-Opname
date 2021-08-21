<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InboundLogistic extends Model
{
    protected $table = "inbound_logistic";
    use HasFactory;

    protected $appends = ['supplier','material'];

    function getSupplierAttribute(){
        return Supplier::find($this->id_supplier);
    }
    function getMaterialAttribute(){
        return Material::find($this->id_material);
    }
}
