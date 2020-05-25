<?php

class SaveImage {

    public $response;

    public function __construct() {
        $result=$this->save();
        $response['error']=$result;
        $json = json_encode($response);
        echo $json;
    }
    
    private function save() {
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $userId = $_POST["userId"];
    
        $target_dir = "images";
        if(!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
    
        $target_dir = $target_dir . "/" . $_FILES["file"]["name"];
    
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir)) {
            return "Good";
        } else {
            return 'Upload image failed';
        }
    }
}

$saveImage = new SaveImage();
