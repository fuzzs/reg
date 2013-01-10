<?php

namespace Entities;

/**
 * @Entity
 * @Table(name="art_votetypes")
 */
class VoteType
{
    /**
     * @Id
     * @Column(type="integer",nullable=false)
     * @GeneratedValue(strategy="AUTO")
     */
    protected $Id;
    
    /**
     * @Column(type="string", length=50, unique=false, nullable=false)
     */
    protected $VoteTypeName;
    
    public function getId() { return $this->Id; }
    
    public function getVoteTypeName() { return $this->VoteTypeName; }
    
}

?>
