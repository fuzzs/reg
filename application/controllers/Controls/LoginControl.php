<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Login extends RegloController {

    public function index()
    {
        $this->load->view('loginView', $data);
    }
}
