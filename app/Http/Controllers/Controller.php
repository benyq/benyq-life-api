<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    const SUCCESS = 0;
    const COMMON_ERROR = -1;

    public function json_success($data,string $msg = '', int $status = self::SUCCESS)
    {
        $return_data = [
            'status' => $status,
            'msg' => $msg,
            'data' => $data
        ];
        return response()->json($return_data);
    }

    public function json_error(string $msg = '操作异常，请稍后再试',int $status = self::COMMON_ERROR)
    {
        $return_data = [
            'status' => $status,
            'msg' => $msg,
            'data' => null
        ];
        return response()->json($return_data);
    }
}
