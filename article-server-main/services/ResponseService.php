<?php

class ResponseService {

    public function success_response($payload){
        $response = [];
        $response["status"] = 200;
        $response["payload"] = $payload;
        return json_encode($response);
    }

    public function bad_request_response($message){
        $response = [];
        $response["status"] = 400;
        $response["message"] = $message;
        return json_encode($response);
    }

    public function not_found_response($message){
        $response = [];
        $response["status"] = 404;
        $response["message"] = $message;
        return json_encode($response);
    }

    public function internal_server_error_response($message){
     $response = [];
        $response["status"] = 500;
        $response["message"] = $message;
        return json_encode($response);
    }
}
?>