<?php

/**
 * Description of RegloBusiness
 *
 * @author fuzzes
 */
class RegloBusiness 
{
    public function __construct()
    {
       
        require_once APPPATH.'libraries/Doctrine/Common/ClassLoader.php';
        
        $businessClassLoader = new \Doctrine\Common\ClassLoader('Business', APPPATH.'libraries');
        $businessClassLoader->register();
        
    }
}

?>
