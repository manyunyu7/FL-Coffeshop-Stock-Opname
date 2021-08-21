<?php

namespace App\Http\Controllers;

use App\Models\InboundLogistic;
use App\Models\Material;
use App\Models\Supplier;
use Illuminate\Http\Request;

class InboundController extends Controller
{
    /**
     * Show the form for managing existing resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewManage()
    {
        $datas = InboundLogistic::all();
        return view('inbound.manage')->with(compact('datas'));
    }

    public function viewAdminEdit($id)
    {
        $datas = InboundLogistic::where('id', '=', $id)->first();
        return view('inbound.edit')->with(compact('datas'));
    }

    public function viewCreate()
    {
        $datas = InboundLogistic::all();
        $materials = Material::all();
        $suppliers = Supplier::all();
        return view('inbound.create')->with(compact('datas','materials','suppliers'));
    }
    
        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new InboundLogistic();
        $data->id_supplier = $request->supplier_id;
        $data->id_material = $request->material_id;
        $data->count = $request->amount;
        $data->transaction_number = $request->transaction_number;
        if ($request->hasFile('photo')) {

            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension(); // you can also use file name
            $fileName = time() . '.' . $extension;

            $savePath = "/web_files/inbound_invoice/";
            $savePathDB = "$savePath$fileName";
            $path = public_path() . "$savePath";
            $file->move($path, $fileName);

            $photoPath = $savePathDB;
            $data->photo = $photoPath;
        }

        if ($data->save()) {
            $material = Material::find($request->material_id);
            $material->stock += $data->count;
            $material->save();

            return back()->with(["success" => "Data saved successfully"]);
        } else {
            return back()->with(["error" => "Saving process failed"]);
        }
    }
}
