<?php

namespace Entities;

/**
 * @Entity
 * @Table(name="usr_roles")
 */
class Role 
{
    /**
     * @Id
     * @Column(type="integer", nullable=false)
     * @GeneratedValue(strategy="AUTO")
     */
    protected $Id;
    
    /**
     * @OneToMany(targetEntity="UserRole", mappedBy="Role")
     */
    protected $UserRole;
    
    /**
     * @Column(type="string", length=120, unique=true, nullable=false)
     */
    protected $RoleName;
}

?>
