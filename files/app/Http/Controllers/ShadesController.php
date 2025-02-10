<?php

namespace App\Http\Controllers;

use App\Models\Shades;
use App\Models\ShadeWarp;
use App\Models\ShadeWeft;
use App\Models\Sort;
use App\Models\SortGrey;
use App\Models\SortWarp;
use App\Models\SortWeft;
use App\Models\Yarn;
use Illuminate\Http\Request;

class
ShadesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Shades::with('parent_sort', 'actual_sort')->orderBy('id','desc')->get();
        return view('shades.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sorts = Sort::where('status', 1)->get();
        $yarns = Yarn::where('status', 1)->get();
        return view('shades.add', compact('sorts', 'yarns'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $item = Shades::create($data);

        foreach ($data["warps"] ?? array() as $row) {
            $array = array();
            $array["shade_id"] = $item->id;
            $array["actual_id"] = $row["actual_id"];
            $array["material_id"] = $row["material_id"];
            ShadeWarp::create($array);
        }

        foreach ($data["wefts"] ?? array() as $row) {
            $array = array();
            $array["shade_id"] = $item->id;
            $array["actual_id"] = $row["actual_id"];
            $array["material_id"] = $row["material_id"];
            ShadeWeft::create($array);
        }
        return redirect('shades')->with('message', "Shade added successfully...");
    }

    /**
     * Display the specified resource.
     */
    public function show(Shades $shades)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $sorts = Sort::where('status', 1)->get();
        $yarns = Yarn::where('status', 1)->get();
        $item = Shades::where('id', $id)->with('parent_sort','warps','wefts')->first();
        return view('shades.add', compact('item', 'sorts', 'yarns'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $data = $request->all();
        $item = Shades::findOrFail($id);
        $item->update($data);
        $item->warps()->delete();
        $item->wefts()->delete();

        foreach ($data["warps"] ?? array() as $row) {
            $array = array();
            $array["shade_id"] = $item->id;
            $array["actual_id"] = $row["actual_id"];
            $array["material_id"] = $row["material_id"];
            ShadeWarp::create($array);
        }

        foreach ($data["wefts"] ?? array() as $row) {
            $array = array();
            $array["shade_id"] = $item->id;
            $array["actual_id"] = $row["actual_id"];
            $array["material_id"] = $row["material_id"];
            ShadeWeft::create($array);
        }
        return redirect('shades')->with('message', "Shade added successfully...");
    }
    /**
     * Update the specified resource in storage.
     */
    public function duplicate(Request $request)
    {
        $id = $request->integer('id');
        $shade = Shades::findOrFail($id);
        $parent = Sort::findOrFail($shade->parent_sort_id);
        $actual_sort = $parent->replicate();
//        dd("parent");
        $actual_sort->sort_no = $parent->sort_no."-".$shade->name;
        $actual_sort->fabric = 'finished';
        $actual_sort->save();

        $data_sort_grey['sort_id'] = $actual_sort->id;
        $data_sort_grey['parent_sort_id'] = $parent->id;
        $sort_gey = SortGrey::create($data_sort_grey);

        $shade->actual_sort_id = $actual_sort->id;
        $shade->save();
        foreach ($parent->warps ?? array() as $row){
            $select = SortWarp::findOrFail($row->id);
            $dup = $select->replicate();
            $dup->sort = $actual_sort->id;
            $dup->save();
        }
        foreach ($parent->wefts ?? array()  as $row){
            $select = SortWeft::findOrFail($row->id);
            $dup = $select->replicate();
            $dup->sort = $actual_sort->id;
            $dup->save();
        }
        return redirect('shades')->with('message', "Sort created successfully...");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shades $shades)
    {
        //
    }
}
