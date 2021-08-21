<?php

namespace App\Http\Controllers;

use App\Models\OutbondLogistic;
use Illuminate\Http\Request;

class OutbondController extends Controller
{
      /**
     * Show the form for managing existing resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewManage()
    {
        $datas = OutbondLogistic::all();
        return view('outbond.manage')->with(compact('datas'));
    }
}
