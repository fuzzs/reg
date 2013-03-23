<?php

/**
 * Description of UserController
 *
 * @author fuzzes
 */
class UserController extends RegloController
{
    /* @var Business\UserBusiness */
    //protected $userBusiness;
    
    
    public function __construct()
    {
        parent::__construct();
    }
    
    protected function init()
    {
        
    }
    
    protected function getSubscribersBase()
    {
        /** @var Business\RegloTransport */
        $ret = new Business\RegloTransport();
        
        $ret->Data = $this->userBusiness->getSubscribers();
        $ret->HasError = false;
        
        return $ret;
    }
    
    /**
     * Shows the profile form
     * @param int $userID
     * @return \Business\RegloTransport
     */
    protected function showProfileEditFormBase($userID = null)
    {
        /* @var $ret Business\RegloTransport */
        $ret = new Business\RegloTransport();
        $ret->HasError = false;
        
        $rightMode = $this->userBusiness->getProfileRightMode($userID);
        $ret->Data['viewMode'] = $rightMode;
        $ret->Data['countryList'] = $this->userBusiness->getCountryList();
        
        if($rightMode == 1)
        {
            $ret->Data['currentUser'] = $this->currentUser;
            
        }
        elseif ($rightMode == 2)
        {
            $ret->Data['currentUser'] = $this->userBusiness->getUserByID($userID);
        }
        else
        {
            $ret->Data['currentUser'] = "";
        }
        
        if ($ret->Data['currentUser'] != "")
        {
            $ret->Data['regionList'] = $this->userBusiness->getRegionList($ret->Data['currentUser']->getCountry());
        }
        
        
        return $ret;
    }
    
    /**
     * Updates the user
     * @param \Entities\User $user
     */
    protected function setUserBase($user)
    {
        if($this->userBusiness->getProfileRightMode($user->getId()) == 1)
        {
            
        }
        else
        {
            
        }
    }
    
    public function Profile()
    {
        $userID = urldecode($this->input->get("userID"));
        $ret = $this->showProfileEditFormBase(1);
        
        $this->load->templateHeader('UserProfileView',  $ret->Data);
        $this->load->view("UserProfileView", $ret->Data);
        $this->load->templateFooter('UserProfileView',  $ret->Data); 
    }
    
    public function Register()
    {
        
        $ret = $this->showProfileEditFormBase(1);
        
        //$this->load->templateHeader('UserRegisterView',  $ret->Data);
        $this->load->view("UserRegisterView", $ret->Data);
        //$this->load->templateFooter('UserRegisterView',  $ret->Data); 
    }
    
    
    
}

?>
