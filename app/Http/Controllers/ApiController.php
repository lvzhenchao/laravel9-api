<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    protected $statusCode = 200;

    public function getStatusCode()
    {
        return $this->statusCode;
    }

    public function setStatusCode($code)
    {
        $this->statusCode = $code;
        return $this;
    }

    //
    public function responseNotFound($message = "Not Found")
    {
        return $this->setStatusCode(404)->responseError($message);
    }

    public function responseError($message)
    {
        return $this->response([
            'status' => 'failed',
            'error' => [
                'status_code' => $this->getStatusCode(),
                'message' => $message,
            ]

        ]);
    }

    public function response($data)
    {
        return response()->json($data, $this->getStatusCode());
    }
}
