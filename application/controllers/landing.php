<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'Controls/LoginControl.php';

class Landing extends RegloController 
{
    private $articleBusiness;
    
    public function index()
    {
        $login = new Controls\LoginControl();
        
        $this->articleBusiness = new Business\ArticleBusiness($this->doctrine);
        
        $data['pageTitle'] = "Reglo.net";
        
        $data['loginForm'] = $login->showLoginForm();
        $data['test'] = sha1('bonjour');
        //$this->load->template('landingView', $data);
        
        $this->load->templateHeader('landingView', $data);
        $this->load->view('landingView', $data);
        $this->load->templateFooter('landingView', $data);
    }
}
