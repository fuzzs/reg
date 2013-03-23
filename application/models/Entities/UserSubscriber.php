<?php

namespace Entities;

/**
 * @Entity
 * @Table(name="usr_usersubscriptions")
 */
class UserSubscriber
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
     * @ManyToOne(targetEntity="User")
     * @JoinColumn(name="UserToId", referencedColumnName="Id")
     */
    protected $UserTo;
    
    /**
     * @OneToMany(targetEntity="User", mappedBy="User")
     */
    protected $UserSubscribers;
    
    /**
     * @return User
     */
    public function getUser() { return $this->User; }
    
    /**
     * @return User
     */
    public function getUserTo() { return $this->UserTo; }
}
?>
