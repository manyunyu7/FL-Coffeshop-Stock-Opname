<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\StockOpname;
use App\Models\StockOpnameData;
use App\Models\User;
use Illuminate\Http\Request;

class StockOpnameController extends Controller
{
    public function viewInputDaily()
    {
        $datas = Material::orderBy('id','desc')->get();
        $users = User::where('role','=','2')->get();
        $materials = Material::orderBy('id')->get();
        return view('opname.create')->with(compact('datas','materials','users'));
    }

    public function storeDaily(Request $request){
        // dd($request->all());
        $objectMain = new StockOpname();
        $objectMain->id_staff;

        if ($request->hasFile('photo')) {

            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension(); // you can also use file name
            $fileName = time() . '.' . $extension;

            $savePath = "/web_files/ttd/";
            $savePathDB = "$savePath$fileName";
            $path = public_path() . "$savePath";
            $file->move($path, $fileName);

            $photoPath = $savePathDB;
            $objectMain->photo = $photoPath;
        }

        if ($objectMain->save()) {
            $opnames = $request->used;

            foreach ($opnames as $key => $value) {
                $product = Material::find($key);
                echo "kirik $product->name used $value <br> ";
                $productData = new StockOpnameData();
                $productData->id_material = $key;
                $productData->remaining_stock = $value;
                $productData->id_opname=$objectMain->id;
                $productData->save();
                # code...
                
                $product->stock = $productData->remaining_stock;
                $product->save();

            }
            return back()->with(["success" => "Data saved successfully"]);
        } else {
            return back()->with(["error" => "Saving process failed"]);
        }

    }

}
