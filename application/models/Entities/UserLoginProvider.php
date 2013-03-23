<?php

namespace Entities;

/**
 * Description of UserLoginProvider
 *
 * @author fuzzes
 * @Entity
 * @Table(name="usr_userloginprovider")
 */
class UserLoginProvider
{
    /**
     * @Id
     * @Column(type="integer", unique=true, nullable=false)
     * @GeneratedValue(strategy="AUTO")
     */
    protected $Id;
    
    /**
     * @ManyToOne(targetEntity="User")
     * @JoinColumn(name="UserId", referencedColumnName="Id")
     */
    protected $User;
    
    /**
     * @ManyToOne(targetEntity="SysLoginProvider")
     * @JoinColumn(name="LoginProviderCode", referencedColumnName="Code")
     */
    protected $SysLoginProvider;
    
    /**
     * @Column(type="string", length=100, unique=true, nullable=false)
     */
    protected $LoginKey;
}

?>
