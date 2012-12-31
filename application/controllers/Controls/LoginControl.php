<?php 

namespace Controls;

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LoginControl extends \RegloController 
{

    public function index()
    {
        $this->showLoginForm();
    }
    
    public function showLoginForm()
    {
        $data['language'] = "English";
        return $this->load->view('loginControlView', $data, true);
    }
    
    public function showAccountManageForm()
    {
        
    }
    
    public function login()
    {
        /* @var $ret \Business\RegloTransport */
        $ret = new \Business\RegloTransport();
        
        $email = $this->input->post("email");
        $password = $this->input->post("password");
        $this->userBusiness = new \Business\UserBusiness($this->doctrine);
   
        $ret = $this->userBusiness->connectUser($email, $password);
        
        if (!$ret->HasError)
        {
            $this->session->set_userdata($ret->Data);
        }
        else
        {
            $ret->Message = "Wrong email or password";
        }
        
        return $ret->Message;
        
    }
    
    public function disconnectUser()
    {
        
    }
}
