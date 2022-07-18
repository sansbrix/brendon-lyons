<?php namespace App\Services\Excel;

use App\Models\ReasonCode;
use App\Models\Status;
use App\Models\ZipCode;
use Exception;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ImportZipCode implements ToModel, SkipsOnFailure, WithHeadingRow, WithValidation   {
    public function onFailure(\Maatwebsite\Excel\Validators\Failure ...$failures)
    {
        foreach($failures as $failure)
        {
            $index = 0;
            foreach ($failure->values() as $array) {
                if(is_null($array)){

                } else if(isset($this->headings()[$index]) && $this->headings()[$index] != null) {
                    throw new Exception($failure->attribute(). ", " .$failure->errors()[0]. " Please check the excel.", 1);
                }
                $index++;
            }
        }
    }

    public function headings(): array
    {
        return [
            'zip',
            'reason',
            'status'
        ];
    }

    public function rules(): array
    {
        return [
            'zip' => 'required',
        ];
    }

    public function checkRowIsNotEmpty(array $row) : bool
    {
        $index = 0;
        $flag = false;
        foreach ($row as $element) {
            if(is_null($element)){

            } else if(isset($this->headings()[$index]) && $this->headings()[$index] != null) {
                $flag = true;
            }
            $index++;
        }

        return $flag ? true : false;
    }

    public function model(array $array) {
        $reasonCode = ReasonCode::where(['reason_code' => $array['reason']])->first();
        if(!$reasonCode && $array['reason']) {
            $reasonCode = ReasonCode::create(['reason_code' => $array['reason']]);
        }

        $status = Status::where(['status' => $array['status']])->first();
        if(!$status && $array['status']) {
            $status = Status::create(['status' => $array['status']]);
        }

        $zipCode = ZipCode::where([
            'zip_code' => $array['zip'],
        ])->first();

        if(!$zipCode) {
            ZipCode::create([
                'zip_code' => $array['zip'],
                'reason_code_id' => $reasonCode ? $reasonCode->id : null,
                'status' => $status ? $status->id : null,
            ]);
        } else {
            $zipCode->update([
                'reason_code_id' => $reasonCode ? $reasonCode->id : null,
                'status_id' => $status ? $status->id : null,
            ]);
        }

    }

}
