<?php namespace App\Services\Excel;

use App\Models\ReasonCode;
use App\Models\ZipCode;
use Exception;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ImportReasonCode implements ToModel, SkipsOnFailure, WithHeadingRow, WithValidation   {
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
            'reason',
        ];
    }

    public function rules(): array
    {
        return [
            'reason' => 'required',
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
        if(!$reasonCode) {
            $reasonCode = ReasonCode::create(['reason_code' => $array['reason']]);
        }
    }

}
