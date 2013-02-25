<?php

namespace Entities;

/**
 * @Entity
 * @Table(name="art_articlevotes")
 */
class ArticleVote
{
    /**
     * @Id
     * @Column(type="integer", nullable=false)
     * @GeneratedValue(strategy="AUTO")
     */
    protected $Id;
    
    /**
     * @ManyToOne(targetEntity="VoteType")
     * @JoinColumn(name="VoteTypeId", referencedColumnName="Id")
     */
    protected $VoteType;
    
    /**
     * @ManyToOne(targetEntity="User")
     * @JoinColumn(name="UserId", referencedColumnName="Id")
     */
    protected $User;
    
    /**
     * @ManyToOne(targetEntity="Article")
     * @JoinColumn(name="ArticleId", referencedColumnName="Id")
     */
    protected $Article;
    
    /**
     * @Column(type="datetime", unique=false, nullable=false)
     */
    protected $VoteDate;
    
    /**
     * @Column(type="boolean", unique=false, nullable=false)
     */
    protected $IsVoteFor;
    
    /**
     * @Column(type="integer", unique=false, nullable=true)
     */
    protected $VoteParam1;
    
    /**
     * @Column(type="integer", unique=false, nullable=true)
     */
    protected $VoteParam2;
    
    /**
     * @Column(type="integer", unique=false, nullable=true)
     */
    protected $VoteParam3;
    
    /**
     * @Column(type="integer", unique=false, nullable=true)
     */
    protected $VoteParam4;
    
    /**
     * @Column(type="integer", unique=false, nullable=true)
     */
    protected $VoteParam5;
    
    /**
     * @Column(type="integer", unique=false, nullable=true)
     */
    protected $VoteParam6;
    
    
}

?>
