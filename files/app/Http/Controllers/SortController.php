<?php

namespace App\Http\Controllers;

use App\Models\GST;
use App\Models\LoomTypes;
use App\Models\PaperTubeSize;
use App\Models\Selvedge;
use App\Models\Sort;
use App\Models\SortWarp;
use App\Models\SortWeft;
use App\Models\Weave;
use App\Models\Yarn;
use Illuminate\Http\Request;

class SortController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sorts = Sort::all();
        return view('sort.index', compact('sorts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $weaves = Weave::all();
        $loom_types = LoomTypes::all();
        $selvedge = Selvedge::all();
        $yarns = Yarn::all();
        $paper_tube_sizes = PaperTubeSize::where('status', 1)->get();
        $igst = GST::select('igst as val')->groupBy('igst')->get();
        $sgst = GST::select('sgst as val')->groupBy('sgst')->get();
        $cgst = GST::select('cgst as val')->groupBy('cgst')->get();
        $master_quality = Sort::where('status', 1)->where('is_master', 1)->get();
        return view('sort.add', compact('weaves', 'loom_types', 'selvedge', 'yarns', 'master_quality', 'paper_tube_sizes', 'igst', 'sgst', 'cgst'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $data = $request->all();
        $sort = Sort::create($data);

        $i = 0;
        foreach ($data["warp_pattern"] ?? array() as $pattern) {
            $warp = array();
            $warp["sort"] = $sort->id;
            $warp["warp_pattern"] = $data["warp_pattern"][$i];
            $warp["warp_material"] = $data["warp_material"][$i];
            $warp["warp_shrinkage"] = $data["warp_shrinkage"][$i];
            $warp["warp_total_ends"] = $data["warp_total_ends"][$i];
            $warp["warp_grams_meters"] = $data["warp_grams_meters"][$i];

            SortWarp::create($warp);
            $i++;
        }

        $i = 0;
        foreach ($data["weft_pattern"] ?? array() as $pattern) {
            $weft = array();
            $weft["sort"] = $sort->id;
            $weft["weft_pattern"] = $data["weft_pattern"][$i];
            $weft["weft_material"] = $data["weft_material"][$i];
            $weft["weft_shrinkage"] = $data["weft_shrinkage"][$i];
            $weft["weft_picks"] = $data["weft_picks"][$i];
            $weft["weft_grams_meters"] = $data["weft_grams_meters"][$i];

            SortWeft::create($weft);
            $i++;
        }

        return redirect('sort')->with('message', "Sort added successfully...");
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $id = $request->integer("id");
        $item = Sort::where('id', $id)->with('warps', 'wefts')->first();
        return response()->json(['status' => true, 'item' => $item]);
        $status = true;
        if (!$item){
            $status = false;
        }
        return response()->json(['status' => $status, 'item' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $weaves = Weave::all();
        $loom_types = LoomTypes::all();
        $selvedge = Selvedge::all();
        $yarns = Yarn::all();
        $paper_tube_sizes = PaperTubeSize::where('status', 1)->get();
        $igst = GST::select('igst as val')->groupBy('igst')->get();
        $sgst = GST::select('sgst as val')->groupBy('sgst')->get();
        $cgst = GST::select('cgst as val')->groupBy('cgst')->get();
        $master_quality = Sort::where('status', 1)->where('is_master', 1)->get();
        $item = Sort::findOrFail($id);
        return view('sort.add', compact('item', 'weaves', 'loom_types', 'selvedge', 'yarns','master_quality', 'paper_tube_sizes', 'igst', 'sgst', 'cgst'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        $data = $request->all();
        $item = Sort::findOrFail($id);
        $item->update($data);

        $i = 0;
        foreach($data["warp_pattern"] as $pattern) {
            $warp = array();
            $warp["sort"] = $id;
            $warp["warp_pattern"] = $data["warp_pattern"][$i];
            $warp["warp_material"] = $data["warp_material"][$i];
            $warp["warp_shrinkage"] = $data["warp_shrinkage"][$i];
            $warp["warp_total_ends"] = $data["warp_total_ends"][$i];
            $warp["warp_grams_meters"] = $data["warp_grams_meters"][$i];
            if($data["warp_id"][$i] > 0){
                $find = SortWarp::findOrFail($data["warp_id"][$i]);
                $find->update($warp);
            }
            else{
                SortWarp::create($warp);
            }
            $i++;
        }

        $i = 0;
        foreach($data["weft_pattern"] as $pattern) {
            $weft = array();
            $weft["sort"] = $id;
            $weft["weft_pattern"] = $data["weft_pattern"][$i];
            $weft["weft_material"] = $data["weft_material"][$i];
            $weft["weft_shrinkage"] = $data["weft_shrinkage"][$i];
            $weft["weft_picks"] = $data["weft_picks"][$i];
            $weft["weft_grams_meters"] = $data["weft_grams_meters"][$i];
            if($data["warp_id"][$i] > 0){
                $find = SortWeft::findOrFail($data["weft_id"][$i]);
                $find->update($weft);
            }
            else{
                SortWeft::create($weft);
            }
            $i++;
        }

        return redirect('sort')->with('message', "Sort updated successfully...");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sort $sort)
    {
        //
    }



}
