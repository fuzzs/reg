<?php

require_once APPPATH.'/controllers/Controls/LoginControl.php';
/**
 * Description of LogonController
 *
 * @author fuzzes
 */
class LoginController extends Controls\LoginControl
{
    function LoginController()
    {
        parent::__construct();
    }
    
    public function logoff()
    {
        parent::logoff();
    }
}

?>
