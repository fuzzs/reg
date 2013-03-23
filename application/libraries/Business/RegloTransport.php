<?php

namespace Business;

class RegloTransport 
{
    /** @var string */
    public $Message;
    /** @var */
    public $HasError;
    public $Data;
    
    public function __construct() 
    {
        $this->HasError = false;
    }
}

?>
