<?php
/**
 * method checks if the Post request has been made from the server 
 * returns True or False boolean  
 */
function isPostRequest() {
    return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
}
/**
  method checks if the Get request has been made from the server 
 * returns True or False boolean 
 */
function isGetRequest() {
    return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'GET' );
}
