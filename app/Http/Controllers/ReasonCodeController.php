<?php

namespace App\Http\Controllers;

use App\Models\ReasonCode;
use App\Models\ZipCode;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReasonCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reasonCodes = ReasonCode::paginate(20);
        return view('admin.reason-codes.index')->with(['reasonCodes' => $reasonCodes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.reason-codes.add-edit')->with(['reasonCode' => null]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $created = ReasonCode::create($request->all());
        if($created) {
            return redirect()->back()->with('success', 'Reason Code Created Successfully');
        } else {
            return redirect()->back()->with('danger', 'Something went wrong. Try again later.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReasonCode  $reasonCode
     * @return \Illuminate\Http\Response
     */
    public function show(ReasonCode $reasonCode)
    {
        return view('admin.reason-codes.add-edit')->with(['reasonCode' => $reasonCode]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReasonCode  $reasonCode
     * @return \Illuminate\Http\Response
     */
    public function edit(ReasonCode $reasonCode)
    {
        return view('admin.reason-codes.add-edit')->with(['reasonCode' => $reasonCode]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReasonCode  $reasonCode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReasonCode $reasonCode)
    {
        $data = $request->all();
        $created = $reasonCode->update($data);
        if($created) {
            return redirect()->back()->with('success', 'Reason Code Updated Successfully');
        } else {
            return redirect()->back()->with('danger', 'Something went wrong. Try again later.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReasonCode  $reasonCode
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReasonCode $reasonCode)
    {
        $findReasonInZip = ZipCode::where('reason_code_id', $reasonCode->id)->count();
        if($findReasonInZip > 0){
            return redirect()->back()->with('danger', 'You cant delete this because it\'s using in other zip codes.');
        } else {
            $reasonCode->delete();
            return redirect()->back()->with('success', 'Reason Code Deleted Successfully');
        }
    }
}
