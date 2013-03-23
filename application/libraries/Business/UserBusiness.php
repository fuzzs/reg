<?php

namespace Business;

use Doctrine\Common\ClassLoader,
    Doctrine\ORM\Tools\Setup,
    Doctrine\ORM,
    Doctrine\ORM\EntityManager,
    Entities\User;

/**
 * Description of UserBusiness
 *
 * @author fuzzes
 * 
 */
class UserBusiness extends BusinessBase
{
    /* @var $user User */
    protected $user;
    
    /* @var $em EntityManager */
    protected $em;
    
    /**
     * 
     * @param \Doctrine $doctrine
     */
    public function __construct(\Doctrine $doctrine)
    {
        parent::__construct($doctrine);
        $this->em = $doctrine->getEntityManager();
    }
    
    
    public function connectUser($email, $password)
    {
        $ret = new RegloTransport();
        
        $dql = "SELECT u FROM Entities\User u WHERE u.Email = :email";
        $query = $this->em->createQuery($dql);
        $query->setParameter('email', $email);
        
        $result = $query->getResult();
        if (count($result) == 1)
        {
            $this->currentUser = $result[0];
            if ($this->currentUser->getHashedPassword() == sha1($password))
            {
                $userdata = array(
                    'username' => $this->currentUser->getUsername(),
                    'email' => $this->currentUser->getEmail(),
                    'userid' => $this->currentUser->getId(),
                    'hash' => sha1($this->currentUser->getEmail() . $this->currentUser->getId() . $this->secStr)
                );
                
                $ret->Data = $userdata;
                $ret->HasError = false;
            }
            else
            {
                $ret->HasError = true;
                unset($this->currentUser);
            }
        }
        else
        {
            $ret->HasError = true;
            unset($this->currentUser);
        }
        
        return $ret;
    }
    
    public function getSubscribers()
    {
        $ret = new RegloTransport();
        
        if ($this->isUserConnected())
        {
            $ret->Data = $this->currentUser->getUserSubscribers();
            $ret->HasError = false;
        }
        else
        {
            $ret->Data = "";
            $ret->HasError = true;
            $ret->Message = "User is not connected";
        }
    }
    
    public function disconnectUser()
    {
        unset($this->currentUser);
    }
    
    public function addFailedLogin()
    {
        
    }
    
    /**
     * Gets the view mode for the profile. 
     * 1 = Editmode for current user
     * 2 = Readmode for any connected user
     * 3 = CreationMode for new user and unconnected
     * @param int $userID
     * @return int
     */
    public function getProfileRightMode($userID = null)
    {
        $profileModeView = 0;
        
        if ($this->isUserConnected())
        {
            // shows the edit form for the user if it's the currentuser
            if ($userID != null && $userID == $this->currentUser->getId())
            {
                // shows the edit form
                $profileModeView = 1;
            }
            else
            {
                // shows the view profile form
                $profileModeView = 2;
            }
                
        }
        else
        {
            // shows the create profile form
            $profileModeView = 3;
        }
        
        return $profileModeView;
    }
}

?>
