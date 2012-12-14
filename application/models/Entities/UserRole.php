<?php

namespace Entities;

/**
 * @Entity
 * @Table(name="usr_userroles")
 */
class UserRole 
{
    /**
     * @Id
     * @Column(type="integer", nullable=false)
     * @GeneratedValue(strategy="AUTO")
     */
    protected $Id;
    
    /**
     * @ManyToOne(targetEntity="User")
     * @JoinColumn(name="UserId", referencedColumnName="Id")
     */
    protected $Users;
    
    /**
     * @ManyToOne(targetEntity="Role")
     * @JoinColumn(name="RoleId", referencedColumnName="Id")
     */
    protected $Roles;
}

?>
