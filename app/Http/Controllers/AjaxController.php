<?php

namespace App\Http\Controllers;

use App\Models\ZipCode;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AjaxController extends Controller
{
    public function getZipCodes(Request $request) {
        $data = ZipCode::with(['reason_code'])->orderBy('updated_at', 'DESC');
        return Datatables::eloquent($data)
            ->addIndexColumn()
            ->make(true);
        }
}
