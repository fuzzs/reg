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
    
    /**
     * @param integer $userID
     * @return RegloTransport
     */
    public function getUserByID($userID)
    {
        $dql = "SELECT u FROM Entities\User u WHERE u.id = :userid";
        $query = $this->em->createQuery($dql);
        $query->setParameters(array(
            'userid' => $userID
        ));
        
        $ret = $query->getResult();
        
        return $ret;
    }
    
    public function getCurrentUser($userdata)       
    {
        if ($userdata['userid'] > 0)
        {
            $this->currentUser = $this->em->find("Entities\User", $userdata['userid']);
        }
    }
    
    public function connectUser($email, $password)
    {
        $ret = new RegloTransport();
        
        $dql = "SELECT u FROM Entities\User u WHERE u.email = :email";
        $query = $this->em->createQuery($dql);
        $query->setParameters(array(
            'email' => $email
        ));
        
        $ret = $query->getResult();
        if (array_count_values($ret) == 1)
        {
            $this->currentUser = $ret[0];
            if ($this->currentUser->getHashedPassword() == sha1($password))
            {
                $userdata = array(
                    'username' => $this->currentUser->getUsername(),
                    'email' => $this->currentUser->getEmail(),
                    'userid' => $this->currentUser->getId()
                );
                
                $this->session->set_userdata($userdata);
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
    
    public function disconnectUser()
    {
        $this->session->sess_destroy();
        unset($this->currentUser);
    }
    
    public function addFailedLogin()
    {
        
    }
}

?>
