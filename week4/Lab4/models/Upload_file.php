<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Upload_file
 *
 * @author 001356815
 */
class Upload_file {

    // function File_Parameters checks if the argument $upfile is not set is true 
    //you get an error     
    //$Upload_file->File_Parameters($upfile);

    public function File_Parameters($upfile) {

        if (!isset($_FILES[$upfile]['error']) || is_array($_FILES[$upfile]['error'])) {
            throw new RuntimeException('Invalid parameters.');
        }
        // Check $_FILES['upfile']['error'] value.
        switch ($_FILES[$upfile]['error']) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_NO_FILE:
                throw new RuntimeException('No file sent.');
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                throw new RuntimeException('Exceeded filesize limit.');
            default:
                throw new RuntimeException('Unknown errors.');
        }
    }

    //IsSizeValid function checks $upfile argument does not exceed the file size
    public function IsSizeValid($upfile) {

        if ($_FILES[$upfile]['size'] > 1000000) {
            throw new RuntimeException('Exceeded filesize limit.');
        }
    }

    /*
     * File_Type function 
     * $finfo built in php function Return information about a file
     * FILEINFO_MIME_TYPE returns mime type 
     */

    public function File_TypeValid($upfile) {

        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $validExts = array(
            'txt' => 'text/plain',
            'html' => 'text/html',
            'pdf' => 'application/pdf',
            'doc' => 'application/msword',
            'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'xls' => 'application/vnd.ms-excel',
            'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'jpg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif'
        );


        $file_Type = pathinfo($upfile, PATHINFO_EXTENSION);
        $ext = array_search($finfo->file($_FILES[$upfile]['tmp_name']), $validExts, true);


        if (false === $ext) {
            throw new RuntimeException("Invalid file format,$file_Type");
        } else {
            $this->isFileUploaded($ext, $upfile);
        }
    }

    // You should name it uniquely.
    // DO NOT USE $_FILES['upfile']['name'] WITHOUT ANY VALIDATION !!
    // On this example, obtain safe unique name from its binary data.
    // 
    public function isFileUploaded($ext, $upfile) {
        $fileName = sha1_file($_FILES[$upfile]['tmp_name']);
        $location = sprintf('./new_upload/%s.%s', $fileName, $ext);
        $this->moveFile($location, $upfile);
        //$this->fileDelete($fileName);
    }

    // is_dir — Tells whether the filename is a directory
    public function addFile($upfile) {

        $this->File_Parameters($upfile);
        $this->IsSizeValid($upfile);
        $this->File_TypeValid($upfile);


//        if (!is_dir('./new_upload')) {
//
//            //mkdir — Makes directory
//            mkdir('./new_upload');
//        }
//
//        if (!move_uploaded_file($_FILES[$upfile]['tmp_name'], $location)) {
//            throw new RuntimeException('Failed to move uploaded file.');
//        }
//        echo 'File is uploaded successfully.';
    }

    public function moveFile($location, $upfile) {
        if (!is_dir('./new_upload')) {
//
            //mkdir — Makes directory
            mkdir('./new_upload');
        }

        if (!move_uploaded_file($_FILES[$upfile]['tmp_name'], $location)) {
            throw new RuntimeException('Failed to move uploaded file.');
        }
        echo 'File is uploaded successfully.';
        }

//    public function fileDelete($fileName){
//        
//        if (file_exists($fileName)){
//            $success = unlink($fileName);
//            if ($success) {
//                echo 'File was deleted';
//            }
//        }
//        
//    }
//    //put your code here
    }
    