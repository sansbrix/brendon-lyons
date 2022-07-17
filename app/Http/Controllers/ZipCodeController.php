<?php

namespace App\Http\Controllers;

use App\Constant\StatusConstant;
use App\Events\ZipUpdatedEvent;
use App\Models\ReasonCode;
use App\Models\Status;
use App\Models\ZipCode;
use App\Services\Excel\ImportZipCode;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ZipCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->name) {
            $zipCodes = ZipCode::where('zip_code', 'LIKE' , '%'.$request->name.'%')->paginate(20);
        } else {
            $zipCodes = ZipCode::paginate(20);
        }

        return view('admin.zip-codes.index')->with(['zip_codes' => $zipCodes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $reasonCodes = ReasonCode::all();
        return view('admin.zip-codes.add-edit')->with([
            'zipCode' => null,
            'reason_codes' => $reasonCodes,
            'statuses' => Status::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $created = ZipCode::create($request->all());
        if($created) {
            return redirect()->back()->with('success', 'Zip Code Created Successfully');
        } else {
            return redirect()->back()->with('danger', 'Something went wrong. Try again later.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ZipCode  $zipCode
     * @return \Illuminate\Http\Response
     */
    public function show(ZipCode $zipCode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ZipCode  $zipCode
     * @return \Illuminate\Http\Response
     */
    public function edit(ZipCode $zipCode)
    {
        $reasonCodes = ReasonCode::all();
        return view('admin.zip-codes.add-edit')->with([
            'zipCode' => $zipCode,
            'reason_codes' => $reasonCodes,
            'statuses' => Status::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ZipCode  $zipCode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ZipCode $zipCode)
    {
        $data = $request->all();
        $created = $zipCode->update([
            'zip_code' => $data['zip_code'],
            'reason_code_id' => $data['reason_code_id'],
            'status_id' => $data['status_id'],
        ]);
        if($created) {
            ZipUpdatedEvent::dispatch();
            return redirect()->back()->with('success', 'Zip Code Updated Successfully');
        } else {
            return redirect()->back()->with('danger', 'Something went wrong. Try again later.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ZipCode  $zipCode
     * @return \Illuminate\Http\Response
     */
    public function destroy(ZipCode $zipCode)
    {
        $zipCode->delete();
        return redirect()->back()->with('success', 'Zip Code Deleted Successfully');
    }

    public function importZipCode(Request $request) {
        try{
            Excel::import(new ImportZipCode, $request->file('file'));
            return redirect()->back()->with('success', 'Zip Code Updated Successfully');
        } catch(\Exception $e) {
            return redirect()->back()->with('danger', $e->getMessage());
        }
    }
}
