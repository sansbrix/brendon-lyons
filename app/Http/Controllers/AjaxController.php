<?php

namespace App\Http\Controllers;

use App\Constant\StatusConstant;
use App\Models\Status;
use App\Models\ZipCode;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AjaxController extends Controller
{
    public function getZipCodes(Request $request) {
        // $notOk = Status::where('status','LIKE', '%NOT OK%')->first();
        $data = ZipCode::with(['reason_code', 'status'])->where('status_id', 1)->orderBy('updated_at', 'DESC');
        return Datatables::eloquent($data)
            ->addColumn('reason_code', function ($order) {
                return $order->reason_code ? $order->reason_code->reason_code : null;
            })
            ->addColumn('status', function ($order) {
                return $order->status ? $order->status->status : null;
            })
            ->addIndexColumn()
            ->make(true);
    }

    public function getZipCodesAll(Request $request) {
        $data = ZipCode::with(['reason_code', 'status'])->orderBy('updated_at', 'DESC');
        return Datatables::eloquent($data)
            ->addColumn('reason_code', function ($order) {
                return $order->reason_code ? $order->reason_code->reason_code : null;
            })
            ->addColumn('status', function ($order) {
                return $order->status ? $order->status->status : null;
            })
            ->addIndexColumn()
            ->make(true);
    }
}
