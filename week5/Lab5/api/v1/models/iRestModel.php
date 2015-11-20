<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author 001356815
 *  specifies which methods a class must implement, 
 * without having to define how these methods are handled.
 */
interface iRestModel {
    //put your code here
    
    function getAll();
    function get($id);
    function post ($getData);
    // put means update
    function put($getData,$id);
    function delete ($id);
    
    
}
