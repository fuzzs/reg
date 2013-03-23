<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


//require_once APPPATH.'models\Entities\Article.php';

/**
 * @name RegloController
 */
class RegloController extends CI_Controller 
{
    protected $locale;
    protected $df;
    
    /** 
     * UserBusiness instance for all related access control uses
     * @var Business\UserBusiness 
     */
    protected $userBusiness;
    
    /** 
     * Get the current connected user
     * @var Entities\User 
     */
    protected $currentUser;
    
    /**
     * Constructor
     */
    function __construct()
    {
        parent::__construct();
        
        $this->lang->load('english', 'english');
        $this->locale = "en_US";
        
        $this->userBusiness = new Business\UserBusiness($this->doctrine);
        
        $this->getUserFromSession();
    }
    
    /**
     * To be moved in business layer
     * Gets the user from the session
     */
    public function getUserFromSession()
    {
        $userdata = $this->session->all_userdata();
        $this->currentUser = $this->userBusiness->getCurrentUser($userdata);
        
    }
    
       
}