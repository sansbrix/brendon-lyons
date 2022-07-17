<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\ZipCode;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statuses = Status::paginate(20);
        return view('admin.status.index')->with(['statuses' => $statuses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.status.add-edit')->with(['status' => null]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $created = Status::create($request->all());
        if($created) {
            return redirect()->back()->with('success', 'Status Created Successfully');
        } else {
            return redirect()->back()->with('danger', 'Something went wrong. Try again later.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function show(Status $status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function edit(Status $status)
    {
        return view('admin.status.add-edit')->with(['status' => $status]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Status $status)
    {
        $data = $request->all();
        $created = $status->update($data);
        if($created) {
            return redirect()->back()->with('success', 'Status Updated Successfully');
        } else {
            return redirect()->back()->with('danger', 'Something went wrong. Try again later.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function destroy(Status $status)
    {
        $findStatusInZip = ZipCode::where('status', $status->status)->count();
        if($findStatusInZip > 0){
            return redirect()->back()->with('danger', 'You cant delete this because it\'s using in other zip codes.');
        } else {
            $status->delete();
            return redirect()->back()->with('success', 'Status Deleted Successfully');
        }
    }
}
