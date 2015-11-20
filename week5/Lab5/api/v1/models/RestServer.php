<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RestServer
 *
 * @author 001356815
 * RestServer outputs the data from the server  
 */
class RestServer {

    private $status = 200;
    private $status_codes = array(
        200 => 'OK',
        201 => 'Created',
        202 => 'Accepted',
        400 => 'Bad Request',
        401 => 'Unauthorized',
        403 => 'Access Forbidden',
        404 => 'Not Found',
        409 => 'Conflict',
        500 => 'Internal Server Error',
    );
    // responds with data or called payload

    private $response = array(
        "message" => NULL,
        "errors" => NULL,
        "data" => NULL
    );
    // sets the id to private 
    private $id; //id variable 
    private $resource; //resource variable 
    private $verb; //verb variable 
    private $serverData; // serverData variable 

    // constructor  includes headers, getRestArgs, setVerb 
    public function __construct() {
        /*
         *  allows access you can control who access your page * means all 
         * "Access-Control-Allow-Orgin: allows permissions 
         * "Access-Control-Allow-Methods: GET, POST, UPDATE, DELETE" allows these methods
         * Content-Type: application/json; charset=utf8 distinguishes application type
         */
        
        header("Access-Control-Allow-Orgin: *");
        //
        header("Access-Control-Allow-Methods: GET, POST, UPDATE, DELETE");
        // content type goes 
        header("Content-Type: application/json; charset=utf8");

        $this->getRestArgs();
        $this->setVerb();
        $this->setServerData();
        $this->getId();
    }
    
       function getServerData() {
        return $this->serverData;
    }
    /*
     * setServerData function sets server data as Json 
     */
    private function setServerData() {
        if (strpos(filter_input(INPUT_SERVER, 'CONTENT_TYPE'), "application/json") !== false) {
            $this->serverData = json_decode(trim(file_get_contents('php://input')), true);


            switch (json_last_error()) {
                case JSON_ERROR_NONE: { //data UTF-8 compliant
                        //tell client to recieve JSON data and send           
                    }
                    break;
                case JSON_ERROR_SYNTAX:
                case JSON_ERROR_UTF8:
                case JSON_ERROR_DEPTH:
                case JSON_ERROR_STATE_MISMATCH:
                case JSON_ERROR_CTRL_CHAR:
                    throw new Exception(json_last_error_msg());
                    break;
                default:
                    throw new Exception('JSON encode error Unknown error');
                    break;
            }
        }
    }

    // sets the response array for the messages 
    public function setResponse($response) {
        $this->response = $response;
    }

    // getId function returns the ID from the server 
    public function getId() {
        return $this->id;
    }

    public function getResource() {
        return $this->resource;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setMessage($message) {
        $this->response ["message"] = $message;
    }

    public function setErrors($errors) {
        $this->response ["errors"] = $errors;
    }

    public function setData($data) {
        $this->response ["data"] = $data;
    }
/*
 * setStatus function allows me to set
 * status codes
 */
    function setStatus($status) {
        $this->status = $status;

// if array is not the $status or Status_codes throw exceptions 
        if (!array_key_exists($status, $this->status_codes)) {
            throw new Exception("Unexpected Header Requested " . $status);
        }
        $this->status;
    }
/*
 * outputResponse outputs status 
 * and echos's JSON on page in Pretty Print 
 */
    public function outputResponse() {

        header("HTTP/1.1 " . $this->getStatus() . " " . $this->status_codes[$this->getStatus()]);
        echo json_encode($this->response, JSON_PRETTY_PRINT);
    }

    public function getRestArgs() {

        $endpoint = filter_input(INPUT_GET, 'endpoint');
        $restArgs = explode('/', rtrim($endpoint, '/'));

        // array gets the first array piece 
        $this->resource = array_shift($restArgs);
        $this->id = NULL;
        // checks to see 
        if (isset($restArgs[0]) && is_numeric($restArgs[0])) {
            $this->id = intval($restArgs[0]);
        }
    }

    // sets the verb and returns the private verb variable 
    public function getVerb() {

        return $this->verb;
    }
/*
 * setVerb function is the action that allows 
 * you set which verbs to use 
 * ie Get, Post, Put, Delete,
 */
    function setVerb() {

        $this->verb = filter_input(INPUT_SERVER, 'REQUEST_METHOD');

        $verbs_allowed = array('GET', 'POST', 'PUT', 'DELETE');

        // in_array is a built in function
        if (!in_array($this->verb, $verbs_allowed)) {
            throw new Exception("Unexpected Header Requested " . $this->verb);
        }
    }

}
