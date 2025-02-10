<?php

namespace App\Http\Controllers;

use App\Models\JobworkWeavingContract;
use App\Models\JobworkWeavingWeftIssue;
use App\Models\JobworkWeavingWeftIssueDetail;
use App\Models\Transportations;
use App\Models\Vendors;
use App\Models\Yarn;
use Illuminate\Http\Request;

class JobworkWeavingWeftIssueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = JobworkWeavingWeftIssue::with('details','jobWork')
            ->orderBy('id', 'desc')->get();
        return view('planning.jobwork_weaving_weft_issue.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jobworks = JobworkWeavingContract::all();
        $transports = Transportations::all();
        $vendors = Vendors::with('yarn_pos','get_vendor_group','get_city','get_state')->where("status", 1)->get();
        $yarns = Yarn::all();
        return view('planning.jobwork_weaving_weft_issue.add', compact('jobworks','transports', 'vendors', 'yarns'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $item = JobworkWeavingWeftIssue::create($data);
        foreach ($data["details"] ?? array() as $row) {
            $row["jobwork_weaving_weft_issue_id"] = $item->id;
            JobworkWeavingWeftIssueDetail::create($row);
        }
        return redirect('jobwork_weaving_weft_issue')->with('message', "Successfully...");

    }

    /**
     * Display the specified resource.
     */
    public function show(JobworkWeavingWeftIssue $jobworkWeavingWeftIssue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $jobworks = JobworkWeavingContract::all();
        $transports = Transportations::all();
        $vendors = Vendors::with('yarn_pos','get_vendor_group','get_city','get_state')->where("status", 1)->get();
        $yarns = Yarn::all();
        $item = JobworkWeavingWeftIssue::findOrFail($id);
//        dd($item->jobWork->sort->sort_no);
        return view('planning.jobwork_weaving_weft_issue.add', compact('item','jobworks','transports', 'vendors', 'yarns'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $item = JobworkWeavingWeftIssue::findOrFail($id);
        $item->update($data);
        $item->details()?->delete();
        foreach ($data["details"] ?? array() as $row) {
            $row["jobwork_weaving_weft_issue_id"] = $item->id;
            JobworkWeavingWeftIssueDetail::create($row);
        }
        return redirect('jobwork_weaving_weft_issue')->with('message', "Successfully...");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobworkWeavingWeftIssue $jobworkWeavingWeftIssue)
    {
        //
    }
}
