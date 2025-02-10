<?php

namespace App\Http\Controllers;

use App\Models\Blend;
use App\Models\Color;
use App\Models\Count;
use App\Models\Filament;
use App\Models\GST;
use App\Models\Ply;
use App\Models\Tpm;
use App\Models\UOM;
use App\Models\Variety;
use App\Models\Yarn;
use App\Models\YarnType;
use Illuminate\Http\Request;

class YarnController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $yarns = Yarn::with('counts','plys','units','get_variety')
            ->orderBy('id', 'desc')->get();
        return view('yarn_master.yarn.index', compact('yarns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $counts = Count::with('yarns')->where("status", 1)->get();
        $ply = Ply::where("status", 1)->get();
        $types = YarnType::where("status", 1)->get();
        $varieties = Variety::where("status", 1)->get();
        $colors = Color::where("status", 1)->get();
        $uom = UOM::where('type', 'yarn_unit')->get();
        $buy_uom = UOM::where('type', 'other_item')->get();
        $filaments = Filament::where('status', 1)->get();
        $tpms = Tpm::where('status', 1)->get();
        $blends = Blend::where('status', 1)->get();
        $igst = GST::select('igst as val')->where('status', 1)->groupBy("igst")->get();
        $sgst = GST::select('sgst as val')->where('status', 1)->groupBy("sgst")->get();
        $cgst = GST::select('cgst as val')->where('status', 1)->groupBy("cgst")->get();
        return view('yarn_master.yarn.add', compact('counts', 'ply', 'types', 'varieties', 'colors', 'uom', 'buy_uom', 'filaments', 'tpms', 'blends', 'igst', 'sgst', 'cgst'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'count' => 'required',
            'ply' => 'required',
            'unit' => 'required',
            'type' => 'required',
            'variety' => 'required',
            'buy_uom' => 'required',
            'name' => 'required',
            'conversion' => 'required',
            'hsn' => 'required',
            'igst' => 'required',
            'sgst' => 'required',
            'cgst' => 'required'
        ]);

        $data['filaments'] = $request->filaments ? $request->filaments : '';
        $data['tpm'] = $request->tpm ? $request->tpm : '';
        $data['color'] = $request->color ? $request->color : '';
        $data['reorder'] = $request->reorder ? $request->reorder : '';
        $data['blend'] = $request->blend ? $request->blend : '';
        $data['danger'] = $request->danger ? $request->danger : '';
        $data['display_name'] = $request->display_name ? $request->display_name : '';
        $data['cess'] = $request->cess ? $request->cess : '';
        $data['is_apply'] = $request->is_apply ? 1 : 0;
        $data['status'] = $request->status ? 1 : 0;

        Yarn::create($data);

        return redirect('yarn')->with('message', 'Yarn added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $id = $request->integer("id");
        $item = Yarn::where('id', $id)->with('counts', 'plys', 'units')->first();
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
        $counts = Count::with('yarns')->where("status", 1)->get();
        $ply = Ply::where("status", 1)->get();
        $types = YarnType::where("status", 1)->get();
        $varieties = Variety::where("status", 1)->get();
        $colors = Color::where("status", 1)->get();
        $uom = UOM::where('type', 'yarn_unit')->get();
        $buy_uom = UOM::where('type', 'other_item')->get();
        $filaments = Filament::where('status', 1)->get();
        $tpms = Tpm::where('status', 1)->get();
        $blends = Blend::where('status', 1)->get();
        $igst = GST::select('igst as val')->where('status', 1)->groupBy("igst")->get();
        $sgst = GST::select('sgst as val')->where('status', 1)->groupBy("sgst")->get();
        $cgst = GST::select('cgst as val')->where('status', 1)->groupBy("cgst")->get();
        $item = Yarn::findOrFail($id);
        return view('yarn_master.yarn.add', compact('item', 'counts', 'ply', 'types', 'varieties', 'colors', 'uom', 'buy_uom', 'filaments', 'tpms', 'blends', 'igst', 'sgst', 'cgst'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'count' => 'required',
            'ply' => 'required',
            'unit' => 'required',
            'type' => 'required',
            'variety' => 'required',
            'buy_uom' => 'required',
            'name' => 'required',
            'conversion' => 'required',
            'hsn' => 'required',
            'igst' => 'required',
            'sgst' => 'required',
            'cgst' => 'required'
        ]);

        $data['filaments'] = $request->filaments ? $request->filaments : '';
        $data['tpm'] = $request->tpm ? $request->tpm : '';
        $data['color'] = $request->color ? $request->color : '';
        $data['reorder'] = $request->reorder ? $request->reorder : '';
        $data['blend'] = $request->blend ? $request->blend : '';
        $data['danger'] = $request->danger ? $request->danger : '';
        $data['display_name'] = $request->display_name ? $request->display_name : '';
        $data['cess'] = $request->cess ? $request->cess : '';
        $data['is_apply'] = $request->is_apply ? 1 : 0;
        $data['status'] = $request->status ? 1 : 0;

        $item = Yarn::findOrFail($id);
        $item->update($data);

        return redirect('yarn')->with('message', 'Yarn updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Yarn $yarn)
    {
        //
    }
}
