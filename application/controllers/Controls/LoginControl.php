<?php 

namespace Controls;

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LoginControl extends \RegloController {

    public function index()
    {
        $this->showLoginForm();
    }
    
    public function showLoginForm()
    {
        $data['language'] = "English";
        return $this->load->view('loginControlView', $data, true);
    }
}