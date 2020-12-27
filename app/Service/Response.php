<?php
namespace App\Service;

trait Response {

    public function respondWithSuccess($message, $data = null)
    {
        return response()->json([
            'success' => true,
            "code"=> 200,
            "locale"=> "en",
            "message" => $message,
            "data" => $data
        ]);
    }

    public function respondWithError($message, $data = null)
    {
        return response()->json([
            'success' => true,
            "code"=> 405,
            "locale"=> "en",
            "message" => $message,
            "data" => $data
        ]);
    }

    public function respond($data, $message = null)
    {
        return response()->json([
            'success' => true,
            "code"=> 200,
            "locale"=> "en",
            "message" => "OK",
            "data" => $data
        ]);
    }
}
