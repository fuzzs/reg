<?php

namespace Entity;

/**
 * @Entity
 * @Table(name="reg_users")
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
     * @Column(type="string", length=120, unique=true, nullable=false)
     */
    protected $Username;
}

?>
