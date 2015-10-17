<?php
//stores basic information about the validity of a field in the form
class Field {

    private $fieldVar; // field variable 
    private $message = ''; // message about the field
    private $hasError = false; // boolean if message has an error

    //constructor method takes the fieldname and an intial message

    public function __construct($fieldVar, $message = '') {
        $this->fieldVar = $fieldVar;
        $this->message = $message;
    }

    // gets the value of the private properties 
    public function getName() {
        return $this->fieldVar;
    }

    public function getMessage() {
        return $this->message;
    }

    public function hasError() {
        return $this->hasError;
    }

    // set error methods sets the errors 
    public function setErrorMessage($message) {
        $this->message = $message;
        $this->hasError = true; // sets has an error 
    }

    // clear error method  
    public function clearErrorMessage() {
        $this->message = '';
        $this->hasError = false;
    }

    public function displaySucessMsg($msg) {
        if (is_string($msg) && !empty($msg)) {
            echo '<h1>', $msg, '</h1>';
        }
    }

    public function getHTML() {
        $message = htmlspecialchars($this->message);
        if ($this->hasError()) {
            return '<span class="error">' . $message . '</span>';
        } else {
            return '<span>' . $message . '</span>';
        }
    }

}

// fields class 
// stores field object in a private associative array 
class Fields {

    private $fields = array();

// add field method takes fieldVar and optional message as it parameters 
// creates a field object and stores it in the array using the fieldVar as a key 
    public function addField($fieldVar, $message = '') {
        $fields = new Field($fieldVar, $message);
        $this->$fieldVar[$fields->getName()] = $fields;
    }

// getField method takes a fieldVar and returns the appropriate 
// field object from the array 

    public function getField($fieldVar) {
        return $this->fields[$fieldVar];
    }

// hasErrors method returns true if any of the individual fields has an error 
// foreach loop checs has errors field object and returns true if an errors found 
// returns false if no errors found 
    public function hasErrors() {
        foreach ($this->fields as $field) {
            if ($field->hasError()) {
                
            }
            return true;
        }
        return false;
    }

}



