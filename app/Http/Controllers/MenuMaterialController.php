<?php

namespace App\Http\Controllers;

use App\Models\MappingMenuMaterial;
use Exception;
use Illuminate\Http\Request;

class MenuMaterialController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request->all());

        $checkQuery = MappingMenuMaterial::where('id_menu', '=', $request->menu_id)
            ->where('id_material', '=', $request->material_id)->count();

        if ($checkQuery) {
            return back()->with(["error" => "That Material already added"]);
        }
        $data = new MappingMenuMaterial();
        $data->id_material = $request->material_id;
        $data->id_menu = $request->menu_id;
        $data->amount = $request->amount;


        if ($data->save()) {
            return back()->with(["success" => "Data saved successfully"]);
        } else {
            return back()->with(["error" => "Saving process failed"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = MappingMenuMaterial::findOrFail($id);
        if ($menu->delete()) {
            return back()->with(["success" => "Data deleted successfully"]);
        } else {
            return back()->with(["error" => "Delete process failed"]);
        }
    }
}
