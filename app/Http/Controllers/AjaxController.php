<?php

namespace App\Http\Controllers;

use App\Constant\StatusConstant;
use App\Models\ZipCode;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AjaxController extends Controller
{
    public function getZipCodes(Request $request) {
        $data = ZipCode::with(['reason_code'])->where('status', StatusConstant::NOT_OK)->orderBy('updated_at', 'DESC');
        return Datatables::eloquent($data)
            ->addColumn('reason_code', function ($order) {
                return $order->reason_code ? $order->reason_code->reason_code : null;
            })
            ->addIndexColumn()
            ->make(true);
    }

    public function getZipCodesAll(Request $request) {
        $data = ZipCode::with(['reason_code'])->orderBy('updated_at', 'DESC');
        return Datatables::eloquent($data)
            ->addColumn('reason_code', function ($order) {
                return $order->reason_code ? $order->reason_code->reason_code : null;
            })
            ->addIndexColumn()
            ->make(true);
    }
}
