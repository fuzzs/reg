<?php 

namespace Controls;

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LoginControl extends \RegloController 
{

    public function index()
    {
        $this->showLoginForm();
    }
    
    protected function init()
    {
        if ($this->userBusiness == null)
        {
             $this->userBusiness = new \Business\UserBusiness($this->doctrine);
        }
    }
    
    public function showLoginForm()
    {
        $data['language'] = "English";
        return $this->load->view('loginControlView', $data, true);
    }
    
    public function showAccountManageForm()
    {
        
    }
    
    protected function loginBase($email, $password)
    {
        $this->init();
   
        /* @var $ret \Business\RegloTransport */
        $ret = $this->userBusiness->connectUser($email, $password);
        
        if (!$ret->HasError)
        {
            $this->session->set_userdata($ret->Data);
        }
        else
        {
            $ret->Message = "Wrong email or password";
            $data['Message'] = $ret->Message;
            $ret->Data = $data;
        }
        
        return $ret;
        
    }
    
    protected function logoffBase()
    {
        $this->init();
        $this->session->sess_destroy();
        $this->userBusiness->disconnectUser();
    }
    
    public function logoff()
    {
        $this->logoffBase();
        $this->load->view("UserDisconnect", array());
    }
}
