<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZipCode extends Model
{
    use HasFactory;
    protected $fillable = ['zip_code', 'reason_code_id', 'status_id'];

    public function reason_code() {
        return $this->belongsTo(ReasonCode::class);
    }

    public function reasonCode() {
        if($this->reason_code()) {
            return $this->reason_code()->reason_code;
        } else {
            return null;
        }
    }

    public function status() {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
