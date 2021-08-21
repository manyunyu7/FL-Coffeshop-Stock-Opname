<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockOpname extends Model
{
    use HasFactory;
    protected $appends = ['user'];

    function getUserAttribute(){
        return User::find($this->id_staff);
    }
}
