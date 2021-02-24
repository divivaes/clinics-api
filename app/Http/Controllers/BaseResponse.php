<?php

namespace App\Http\Controllers;

trait BaseResponse
{
    protected function successResponse($data, $code = 200, $human_message = null, $code_message = null)
    {
        return response()->json([
            'status' => 'Success',
            'error' => false,
            'human_message' => $human_message,
            'code_message' => $code_message,
            'response' => $data
        ], $code);
    }

    protected function errorResponse($code, $human_message = null, $code_message = null)
    {
        return response()->json([
            'status' => 'Error',
            'error' => true,
            'human_message' => $human_message,
            'code_message' => $code_message,
            'response' => null
        ], $code);
    }
}
