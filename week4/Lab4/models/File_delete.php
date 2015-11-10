<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of fileDelete
 *
 * @author Ques
 */
class File_delete {

    //put your code here
    // delete file function if FileName exits 
    public function f_Delete($file) {

        if (unlink('./new_upload/' . $file)) {
            throw new RuntimeException('File not Deleted' . $file);
            //echo "Deleted $file!\n";
        } else {
            echo 'File Deleted' . '' . $file;
        }
    }

}
