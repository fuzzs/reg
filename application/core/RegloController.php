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
    
    /* @var $currentUser Entities\User */
    protected $currentUser;
    
    function __construct()
    {
        parent::__construct();
        
        $this->lang->load('english', 'english');
        $this->locale = "en_US";
        
        $this->userBusiness = new Business\UserBusiness($this->doctrine);
        
        $this->getUserFromSession();
    }
    
    public function getUserFromSession()
    {
        $userdata = $this->session->all_userdata();
        $this->currentUser = $this->userBusiness->getCurrentUser($userdata);
        
    }
    
       
}