<?php require_once './autoload.php'; ?>
<?php

// put your code here

try {
    // creates  new instance for rest server class 
    $restServer = new RestServer ();
    // start rest server with a message of 200 with ok 
    $restServer->setStatus(200);
  
    
    /*
     *  make a variable resource to getResource function from
     *  
     */
    
    $resource = $restServer->getResource();
    $verb = $restServer->getVerb();
    
    if ($resource === 'corps'){
        $resourceCorps = new Corporations();
        
        
        if ($verb === 'GET'){                 
        $data = $resourceCorps ->getAll(); 
         $restServer->setData($data);

        }
        
    }
    
     

        
    
    
    
    
} catch (Exception $ex) {
    $restServer->setErrors($ex->getMessage());
    $restServer->setStatus(500);
}

$restServer->outputResponse();



