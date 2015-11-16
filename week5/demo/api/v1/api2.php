<?php require_once './autoload.php'; ?>
<?php

// put your code here

try {

    $restServer = new RestServer ();
    $restServer->setStatus(200);
     $restServer->getResource();
    echo $restServer->getId();
    
} catch (Exception $ex) {
    $restServer->setErrors($ex->getMessage());
}

$restServer->outputResponse();


