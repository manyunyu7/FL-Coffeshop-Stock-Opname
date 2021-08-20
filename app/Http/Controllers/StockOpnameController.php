<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class StockOpnameController extends Controller
{
    public function viewInputDaily()
    {
        $datas = Material::all();
        return view('opname.create')->with(compact('datas'));
    }

}
