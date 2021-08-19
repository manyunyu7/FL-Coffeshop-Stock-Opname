<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Exception;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewCreate()
    {
        return view('supplier.create');
    }
    /**
     * Show the form for editing a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewEdit($id)
    {
        $datas = Supplier::where('id', '=', $id)->first();
        return view('supplier.edit')->with(compact('datas'));
    }


    /**
     * Show the form for managing existing resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewManage()
    {
        $datas = Supplier::all();
        return view('supplier.manage')->with(compact('datas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $object = new Supplier();
        $object->name = $request->name;
        $object->contact = $request->contact;
        $object->address = $request->address;
        if ($request->hasFile('photo')) {

            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension(); // you can also use file name
            $fileName = time() . '.' . $extension;

            $savePath = "/web_files/supplier/";
            $savePathDB = "$savePath$fileName";
            $path = public_path() . "$savePath";
            $file->move($path, $fileName);

            $photoPath = $savePathDB;
            $object->photo = $photoPath;
        }

        if ($object->save()) {
            return back()->with(["success" => "Data saved successfully"]);
        } else {
            return back()->with(["error" => "Saving process failed"]);
        }
    }

    public function update(Request $request)
    {
        $object = Supplier::findOrFail($request->id);
        $object->name = $request->name;
        $object->contact = $request->contact;
        $object->address = $request->address;
        if ($request->hasFile('photo')) {
            // remove photo first
            $file_path = public_path() . $object->photo;
            if (file_exists($file_path)) {
                try {
                    unlink($file_path);
                } catch (Exception $e) {
                    // Do Nothing on Exception
                }
            }


            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension(); // you can also use file name
            $fileName = time() . '.' . $extension;

            $savePath = "/web_files/supplier/";
            $savePathDB = "$savePath$fileName";
            $path = public_path() . "$savePath";
            $file->move($path, $fileName);

            $photoPath = $savePathDB;
            $object->photo = $photoPath;
        }

        if ($object->save()) {
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
        $data = Supplier::findOrFail($id);
        $file_path = public_path() . $data->photo;
        if (file_exists($file_path)) {
            try {
                unlink($file_path);
            } catch (Exception $e) {
                // Do Nothing on Exception
            }
        }
        if ($data->delete()) {
            return back()->with(["success" => "Data deleted successfully"]);
        } else {
            return back()->with(["error" => "Delete process failed"]);
        }
    }
}
