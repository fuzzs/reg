<?php

namespace Entities;

/**
 * @Entity
 * @Table(name="usr_userlogins")
 */
class UserLogin
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
    protected $User;

    /**
     * @Column(type="datetime", nullable=false)
     */
    protected $LoginDate;
    
    /**
     * @Column(type="integer", nullable=false)
     */
    protected $LoginFailed;
    
    /**
     * @Column(type="string", length=120, nullable=true)
     */
    protected $Message;
    
    public function createUserLogin($user, $isFailed, $message)
    {
        $this->User;
        $this->LoginFailed = $isFailed;
        $this->Message = $message;
        
        $this->LoginDate = new \DateTime("now");
    }
}

?>
