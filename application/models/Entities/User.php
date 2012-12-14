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
}

?>
