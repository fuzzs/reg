<?php

namespace Entities;

/**
 * @Entity
 * @Table(name="usr_users")
 */
class User 
{
    /**
     * @Id
     * @Column(type="integer", nullable=false)
     * @GeneratedValue(strategy="AUTO")
     */
    protected $Id;
    
    /**
     * @OneToMany(targetEntity="UserRole", mappedBy="User")
     */
    protected $UserRole;
    
    /**
     * @Column(type="string", length=120, unique=true, nullable=false)
     */
    protected $Username;
    
    /**
     * @Column(type="string", length=120, unique=false, nullable=false)
     */
    protected $Firstname;
    
    /**
     * @Column(type="string", length=120, unique=false, nullable=false)
     */
    protected $Lastname;
    
    
    
    public function getUsername()
    {
        return $this->Username;
    }
    
    public function getFirstname()
    {
        return $this->Firstname;
    }
    
    public function getLastname()
    {
        return $this->Lastname;
    }
    
    public function getDisplayName()
    {
        return $this->Firstname . " " . $this->Lastname;
        
    }
}

?>
