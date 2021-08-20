<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MappingMenuMaterial extends Model
{
    protected $table = "mapping_menu_material";
    use HasFactory;

    protected $appends = ['menu','material'];

    function getMenuAttribute(){
        return Menu::find($this->id_menu);
    }
    function getMaterialAttribute(){
        return Material::find($this->id_material);
    }

}
