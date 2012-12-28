<?php

namespace Business;

class RegloTransport 
{
    public $Message;
    public $HasError;
    public $Data;
    
    public function __construct() 
    {
        $this->HasError = false;
    }
}

?>
