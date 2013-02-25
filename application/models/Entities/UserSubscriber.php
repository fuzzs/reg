<?php

namespace Entities;

/**
 * @Entity
 * @Table(name="usr_usersubscriptions")
 */
class UserSubscription
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
     * @OneToMany(targetEntity="User", mappedBy="User")
     */
    protected $UserSubscriptions;
}
?>
