<?php

class IsNotValidUrlException extends Exception {

    public function errorMessage() {
        //error message
        $errorMsg = 'Error on line ' . $this->getLine() . ' in ' . $this->getFile()
                . "Error : " . $this->getMessage();
        return $errorMsg;
    }

}
