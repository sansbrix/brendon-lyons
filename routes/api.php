<?php

use App\Constant\StatusConstant;
use App\Models\ReasonCode;
use App\Models\ZipCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/get-zip-codes', function(Request $request) {

    if($request->has('status')) {
        if(in_array($request->get('status'), StatusConstant::getConstants())) {
            $zipCodes = ZipCode::where('status', $request->get('status'))->paginate(20);
        } else {
            return response()->json([
                'error' => 'Wrong status code.',
                'message' => 'Status code should be either'. implode(", ", StatusConstant::getConstants())
            ], 500);
        }
    } else if($request->has('reason_code')) {
        $SearchableReasonCode = $request->get('reason_code');
        $ReasonCodes = ReasonCode::all()->pluck('reason_code')->unique('reason_code')->values()->toArray();
        if(in_array($request->get('reason_code'),$ReasonCodes )) {
            $zipCodes = ZipCode::whereHas('reason_code', function($query) use ($SearchableReasonCode) {
                $query->where('reason_code', $SearchableReasonCode);
            })->paginate(20);
        } else {
            return response()->json([
                'error' => 'Wrong reason found.',
                'message' => 'Status code should be either '. implode(", ", $ReasonCodes)
            ], 500);
        }

    } else if($request->has('zip_code')) {
        $zipCodes = ZipCode::where('zip_code', 'LIKE', '%'.$request->get('zip_code').'%')->paginate(20);
    } else {
        $zipCodes = ZipCode::paginate(20);
    }

    return response()->json($zipCodes);
});
