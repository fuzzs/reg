<?php

namespace Business;

/**
 * Description of BusinessBase
 *
 * @author fuzzes
 */
class BusinessBase
{
    protected $em;
    protected $currentUser;
    
    public function __construct($doctrine) 
    {
        $this->em = $doctrine->em;
        $this->getCurrentUser();
    }
    
    private function getCurrentUser()       
    {
        $this->currentUser = $this->em->find("Entities\User", 1);
    }
}

?>
