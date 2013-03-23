<?php

require_once APPPATH.'/controllers/UserController.php';

/**
 * Description of UserAjaxController
 *
 * @author fuzzes
 */
class UserAjaxController extends UserController
{
    function __construct()
    {
        parent::__construct();
    }
    
    public function getSubscribers()
    {
        $ret = $this->getSubscribersBase();
        
        if ($ret->HasError)
        {
            $this->load->view('ajax/Error', $ret->Data);
        }
        else
        {
            $this->load->view('ajax/UserSubscriberList', $ret);
        }
    }
}

?>
