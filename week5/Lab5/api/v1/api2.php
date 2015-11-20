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

    $resource = $restServer->getResource(); //getting resoucres from restserver getResource function
    $verb = $restServer->getVerb(); // getting the verb from restserver getVerb function
    $getData = $restServer->getServerData(); // getting the verb from restserver getServerData function
    $id = $restServer->getId(); // getting the verb from restserver getServerData function

    /*
     * start of Get, Put, Post, Delete if statments 
     * 
     */
    if ($resource === 'corps') {
        $resourceCorps = new Corporations(); //new instance of Corporations class
        $dataResults = null;

        /*
         * verb Get condition Gets information from the corps table 
         * if $id is Null(Resource Endpoint Text Box is empty of an Id)the dataResults returns all 
         * data from the getAll function in the Corporations Class
         * else you a add an id to the(Resource Endpoint Text Box :corp/### ) the get function
         * returns only the information associated with that $id 
         */
        if ($verb === 'GET') {
            if ($id === NULL) {
                $dataResults = $resourceCorps->getAll();
            } else {
                $dataResults = $resourceCorps->get($id);
            }
        }

        /*
         * $verb PUT condition updates information to the corps table 
         */
        if ($verb === 'PUT') {
            /*
             * if the $id is NULL InvalidArgumentException $id not found in the table 
             * else if the Id exsists in the corps database you can update the row 
             * 
             */
            if ($id === NULL) {
                throw new InvalidArgumentException('Corporation ID ' . $id . ' was not found');
            } else {
                $dataResults = $resourceCorps->put($getData, $id);
            }
        }
        /*
         * $verb POST adds a new row to the corps table 
         */
        if ($verb === 'POST') {

            /*
             * if post condition is true the post function executes from the Corporation Class
             * with a message 
             */
            if ($resourceCorps->post($getData)) {
                $restServer->setMessage('New Corporation Information Added');
                $restServer->setStatus(201);
                /*
                 * else if the information was not added you Corporation could not be added
                 */
            } else {
                throw new Exception('Corporation could not be added');
            }
        }
        /*
         * $veb DELETE deletes information from the corps table by the delete 
         * function in Corporation class
         */
        if ($verb === 'DELETE') {
            /*
             * if condition is true id required message is displayed 
             */
            if ($id === NULL) {
                throw new InvalidArgumentException('Id required');
                /*
                 * else this condition is true 
                 * the delete function executes from the 
                 * Corporation Class 
                 */
           
            } else {
                if ($resourceCorps->delete($id)) {
                    $restServer->setMessage($id . ' Has been deleted');
                }
            }
        }
        
        $restServer->setData($dataResults);
    }
} catch (Exception $ex) {
    $restServer->setErrors($ex->getMessage());
    $restServer->setStatus(500);
}

$restServer->outputResponse();



