<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Message
 *
 * @author 001356815
 */
class Message implements IMessage{
    protected $messages = array ();
    
    public function addMessage($key, $msg) {
        $this->messages[$key] = $msg;
    }
    
    // unset removes message 
    public function removeMessage ($key){
        unset($this->messages[$key]);
        
    }

    //put your code here
     public function getAllMessages() {
        return $this->messages;
    }
     public function removeAllMessages() {
        return $this->messages;
    }
    
}
