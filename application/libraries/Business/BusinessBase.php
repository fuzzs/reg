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
    /* @var $em EntityManager */
    protected $em;
    
    
    //TODO: check current user in session
    /* @var $currentUser Entities\User */
    protected $currentUser;
    
    public function __construct(\Doctrine $doctrine) 
    {
        $this->em = $doctrine->getEntityManager();
    }
    
    
}



?>
