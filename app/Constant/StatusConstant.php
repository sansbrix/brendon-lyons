<?php namespace App\Constant;

class StatusConstant {

    const OK = 'OK';
    const NOT_OK = 'NOT_OK';

    public static function getConstants() {
        return [
            StatusConstant::OK,
            StatusConstant::NOT_OK,
        ];
    }
}
