<?php

namespace Entities;

/**
 * Description of SysLoginProvider
 *
 * @author fuzzes
 * @Entity
 * @Table(name="sys_loginproviders")
 */
class SysLoginProvider
{
    /**
     * @Id
     * @Column(type="string", length=10, nullable=false)
     */
    protected $Code;
    
    /**
     * @Column(type="string", length=30, unique=false, nullable=false)
     */
    protected $Name;
    
    /**
     * @Column(type="string", length=250, unique=false, nullable=false)
     */
    protected $Url;
    
    /**
     * @Column(type="string", length=100, unique=false, nullable=true)
     */
    protected $Token;
    
    /**
     * @Column(type="string", length=250, unique=false, nullable=true)
     */
    protected $DevUrl;
    
    /**
     * @Column(type="string", length=100, unique=false, nullable=true)
     */
    protected $DevToken;
    
}

?>
