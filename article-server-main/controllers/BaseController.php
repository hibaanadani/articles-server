<?php

require(__DIR__ . "/../connection/connection.php");
require(__DIR__ . "/../services/ArticleService.php");
require(__DIR__ . "/../services/ResponseService.php");

class BaseController{
     protected $request;
     protected $helpers = [];

     public function get()
    {
        try
            echo ResponseService::success_response($data);
        catch () 
            echo ResponseService::not_found_response("Not found");
    }
      public function getAll()
    {
        try
            echo ResponseService::success_response($data);
        catch () 
            echo ResponseService::not_found_response("Not found");
    }

    public function delete()
    {
        try
            echo ResponseService::success_response($data);
        catch () 
             echo ResponseService::bad_request_response();
    }

      public function deleteAll()
    {
        try
            echo ResponseService::success_response($data);
        catch () 
             echo ResponseService::bad_request_response();
    }

       public function create()
    {
        try
            echo ResponseService::success_response($data);
        catch () 
             echo ResponseService::internal_server_error_response('internal_server_error_response');
    }


       public function update()
    {
        try
            echo ResponseService::success_response($data);
        catch () 
             echo ResponseService::internal_server_error_response('internal_server_error_response');
    }

}
?>