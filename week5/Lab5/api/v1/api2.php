<?php require_once './autoload.php'; ?>
<?php

// put your code here

try {
    // creates  new instance for rest server class 
    $restServer = new RestServer ();
    // start rest server with a message of 200 with ok 
    $restServer->setStatus(200);


    /* create variables to acces functions from the RestServer Class **
     *  make a variable resource to getResource function from
     *  RestServices
     */

    $resource = $restServer->getResource();
    $verb = $restServer->getVerb();
    $getData = $restServer->getServerData();

    if ($resource === 'corps') {
        $resourceCorps = new Corporations();


        if ($verb === 'GET') {
            $data = $resourceCorps->getAll();
            $restServer->setData($data);
        }
    }

    if ($verb === 'POST') {

        if ($resourceCorps->post($getData)) {
            $restServer->setMessage('Corporation Information Added');
            $restServer->setStatus(201);
        } else {
            throw new Exception('Corporation could not be added');
        }
    }
} catch (Exception $ex) {
    $restServer->setErrors($ex->getMessage());
    $restServer->setStatus(500);
}

$restServer->outputResponse();



