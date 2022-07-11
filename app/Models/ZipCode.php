<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZipCode extends Model
{
    use HasFactory;
    protected $fillable = ['zip_code', 'reason_code_id', 'status'];

    public function reason_code() {
        return $this->belongsTo(ReasonCode::class);
    }
}
