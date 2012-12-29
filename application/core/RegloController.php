<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

//require_once APPPATH.'models\Entities\Article.php';

class RegloController extends CI_Controller 
{
    protected $locale;
    protected $df;
    
    /* @var $userBusiness Business\UserBusiness */
    protected $userBusiness;
    
    function __construct()
    {
        parent::__construct();
        
        $this->lang->load('english', 'english');
        $this->locale = "en_US";
        
        $userBusiness = new Business\UserBusiness($this->doctrine);
    }
    
    public function getUserFromSession()
    {
        $userdata = $this->session->all_userdata();
        $userBusiness->getCurrentUser($userdata);
    }
       
}