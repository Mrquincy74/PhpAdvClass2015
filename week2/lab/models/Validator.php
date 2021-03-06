<?php

/**
 * Description of Validator
 *
 * @author 
 */
class Validator {
    /**
     * A method to check if an email is valid.
     *
     * @param {String} [$email] - must be a valid email
     *
     * @return boolean
     */
    
     public function emailIsEmpty($email) {
        if (empty($email)) {
            return true;
        } else {
            return false;
        }
    }
    public function emailIsValid($email) {
        return ( is_string($email) && !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL) !== false );
    }
    public function passwordIsEmpty($password) {
        if (empty($password)) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * A method to check if a phone number is valid.
     *
     * @param {String} [$phone] - must be a valid phone number
     *
     * @return boolean
     */
    public function phoneIsValid($phone) {
        return ( preg_match("/^\(?([2-9]{1}[0-9]{2})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/", $phone) );
    }
}
