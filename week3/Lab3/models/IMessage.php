<?php

/**
 *
 * @author 001356815
 */
interface IMessage {
    //put your code here
    public function addMessage($key, $msg);
    public function removeMessage ($key);
    public function getAllMessages(); 
    public function removeAllMessages(); 
}
