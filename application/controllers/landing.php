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
        
        $article = $this->articleBusiness->getArticleByID(1);
        
        $data['test'] = $article->Data->getContent();
        $data['loginForm'] = $login->showLoginForm();
        //$data['test'] = APPPATH;
        //$this->load->template('landingView', $data);
        
        $this->load->templateHeader('landingView', $data);
        $this->load->view('landingView', $data);
        $this->load->templateFooter('landingView', $data);
    }
}
