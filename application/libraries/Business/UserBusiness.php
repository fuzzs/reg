<?php

namespace Business;

use Doctrine\Common\ClassLoader,
    Doctrine\ORM\Tools\Setup,
    Doctrine\ORM\EntityManager;

/**
 * Description of ArticleBusiness
 *
 * @author fuzzes
 */
class UserBusiness extends BusinessBase
{
    public function __construct($doctrine)
    {
        parent::__construct($doctrine);
    }
    
    public function getUserByID($userID)
    {
        
    }
}

?>
