<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author 001356815
 */
interface iRestModel {
    //put your code here
    function getAll();
    function get($id);
    function post ($serverData);
    // put means update
    function put();
    function delete ();
    
    
}
