<?php

/**
 * Description of util
 *
 * @author GFORTI
 */
class Util {
    
    
    /**
    * A method to check if a Post request has been made.
    *    
    * @return boolean
    */
   public function isPostRequest() {
       return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
   }
   
   /* function   getDBConfig allows phpadvclassfall2015 
    * DB to be accessed
    * 
    */
   public function getDBConfig() {
       return array(
            'DB_DNS' => 'mysql:host=localhost;port=3306;dbname=phpadvclassfall2015',
            'DB_USER' => 'root',
            'DB_PASSWORD' => ''
        );       
   }

    
}
