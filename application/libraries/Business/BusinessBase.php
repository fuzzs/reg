<?php

namespace Business;

use Doctrine\Common\ClassLoader,
    Doctrine\ORM\Tools\Setup,
    Doctrine\ORM\EntityManager,
    Entities;
/**
 * Description of BusinessBase
 *
 * @author fuzzes
 */
class BusinessBase
{
    /** @var EntityManager */
    protected $em;
    
    // not in production
    protected $secStr = "123";
    
    //TODO: check current user in session
    
    /** 
     * Get the current connected user
     * @var Entities\User 
     */
    protected $currentUser;
    
    public function __construct(\Doctrine $doctrine) 
    {
        $this->em = $doctrine->getEntityManager();
    }
    
    
    /**
     * Checks if the current user is connected
     * @return boolean
     */
    public function isUserConnected()
    {
        if (isset($this->currentUser) && $this->currentUser->getId() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    /**
     * Gets the user from its id in the database
     * @param integer $userID
     * @return Entities\User
     */
    public function getUserByID($userID)
    {
        /* @var $query \Doctrine\ORM\Query */
        /* @var $retUser \Entities\User */
        $dql = "SELECT u FROM Entities\User u WHERE u.Id = :userid";
        
        $query = $this->em->createQuery($dql);
        $query->setParameters(array(
            'userid' => $userID
        ));
        
        $retUser = $query->getResult();
        
        return $retUser;
    }
    
    
    /**
     * Gets the current user as set in the session
     * @param Array $userdata
     * @return Entities\User
     */
    public function getCurrentUser($userdata)       
    {
        if ($userdata != null && array_key_exists('userid', $userdata))
        {
            if (array_key_exists('hash', $userdata))
            {
                /* @var $tmpUser Entities\User */
                $tmpUser = $this->em->find("Entities\User", $userdata['userid']);
                if (sha1($tmpUser->getEmail() . $tmpUser->getId() . $this->secStr) == $userdata['hash'])
                {
                    $this->currentUser = $tmpUser;
                }
            }
            
        }
        else
        {
            $this->currentUser = new \Entities\User();
        }
        
        return $this->currentUser;
    }
    
    /**
     * Gets all countries
     * @return \Entities\Country
     */
    public function getCountryList()
    {
        /* @var $retCountries \Entities\Country */
        $dql = "SELECT c FROM Entities\Country c";
        
        $query = $this->em->createQuery($dql);
        $retCountries = $query->getResult();
        
        return $retCountries;
    }
    
    /**
     * Gets regions for a specific country
     * @param string $countryCode
     * @return \Entities\Region
     */
    public function getRegionList($countryCode)
    {
        /* @var $retRegions \Entities\Region */
        $dql = "SELECT r FROM Entities\Region r WHERE r.Country = :countryCode";
        
        $query = $this->em->createQuery($dql);
        $query->setParameter("countryCode", $countryCode);
        $retRegions = $query->getResult();
        
        return $retRegions;
    }
    
}



?>
